<?php

namespace App\View\Components\Portal\Widgets;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Http;

class News extends Component
{
    /**
     * Create a new component instance.
     */
   
     public $newsItems;
    public function __construct($url)
    {
        $response = Http::get($url);
        if ($response->ok()) {           
            $rss = simplexml_load_string($response->body());                    
            $newsItems = [];             
            foreach ($rss->channel->item as $item) {
                $newsItems[] = [
                    'title' => (string) $item->title,
                    'link' => (string) $item->link,
                    'description' => (string) $item->description,
                    'pubDate' => (string) $item->pubDate
                ];
            }              
        } 
        $this->newsItems=$newsItems;
        // dd($this->newsItems);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.portal.widgets.news');
    }
}
