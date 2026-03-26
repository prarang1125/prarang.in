<?php

namespace App\View\Components\Portal;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\View\Component;

class News extends Component
{
    /**
     * Create a new component instance.
     */
    public $newsItems = [];
    public $side;
    public $error = null;

    public function __construct($url, $side = 'left')
    {
        $this->side = $side;

        if (empty($url)) {
            $this->error = "No feed URL provided";
            return;
        }

        try {
            // dd($url);
            $cacheKey = 'news_feed_' . md5($url);
            $this->newsItems = cache()->remember($cacheKey, now()->addMinutes(30), function () use ($url) {
                $response = Http::timeout(10)->get($url);

                if (!$response->ok()) {
                    return [];
                }

                $xmlString = $response->body();
                // Basic cleanup of XML to avoid common parsing issues
                $xmlString = trim($xmlString);

                $rss = @simplexml_load_string($xmlString, 'SimpleXMLElement', LIBXML_NOCDATA);
                if (!$rss) {
                    return [];
                }

                $items = [];
                // Handle RSS 2.0
                if (isset($rss->channel->item)) {
                    foreach ($rss->channel->item as $item) {
                        $items[] = $this->parseItem($item);
                    }
                }
                // Handle Atom
                elseif (isset($rss->entry)) {
                    foreach ($rss->entry as $entry) {
                        $items[] = $this->parseItem($entry);
                    }
                }

                // dd($items);

                return array_slice($items, 0, 15); // Limit to top 15 items
            });
        // dd($this->newsItems);

            if (empty($this->newsItems)) {
                $this->error = "Unable to load news at this time";
            }
        } catch (\Exception $e) {
            \Log::error("News Component Error: " . $e->getMessage());
            $this->error = "News service temporarily unavailable";
        }
    }

    protected function parseItem($item)
    {
        $title = (string) $item->title;
        $link = (string) ($item->link['href'] ?? $item->link);

        // Handle description/summary
        $description = (string) ($item->description ?? $item->summary ?? $item->content ?? '');
        $description = strip_tags($description);

        // Handle date
        $pubDate = (string) ($item->pubDate ?? $item->published ?? $item->updated ?? '');
        try {
            $date = \Carbon\Carbon::parse($pubDate);
            $formattedDate = $date->diffForHumans();
        } catch (\Exception $e) {
            $formattedDate = 'Recently';
        }

        return [
            'title' => trim($title),
            'link' => trim($link),
            'description' => trim($description),
            'date' => $formattedDate,
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.portal.news');
    }
}
