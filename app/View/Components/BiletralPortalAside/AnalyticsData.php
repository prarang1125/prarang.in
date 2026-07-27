<?php

namespace App\View\Components\BiletralPortalAside;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Str;

class AnalyticsData extends Component
{
    public $data;
    public $side;
    public $baseUrl;
    public $format; // 'hyphen-plural' or 'path-singular'

    public function __construct($data, $side = 'left')
    {
        $this->data = $data;
        $this->side = $side;

        // Determine format based on country name (hacky but matches existing hardcoded logic)
        if (Str::contains(Str::lower($data->country_name), 'india')) {
            $this->baseUrl = "https://g2c.prarang.in/india";
            $this->format = 'path-singular';
        } else {
            // Assume Czech Republic or other hyphenated plural style
            $slug = Str::slug($data->country_name);
            $this->baseUrl = "https://g2c.prarang.in/" . $slug;
            $this->format = 'hyphen-plural';
        }
    }

    public function getUrl($type)
    {
        if ($this->format === 'path-singular') {
            return $this->baseUrl . "/" . $type;
        } else {
            // hyphen-plural
            $plural = $type . 's';
            if ($type === 'media') $plural = 'medias'; // based on user's code
            if ($type === 'edu') $plural = 'edus';
            if ($type === 'urb') $plural = 'urbs';
            if ($type === 'gov') $plural = 'govs';
            if ($type === 'int') $plural = 'ints';
            if ($type === 'lang') $plural = 'langs';
            if ($type === 'demo') $plural = 'demos';

            return $this->baseUrl . "-" . $plural;
        }
    }

    public function render(): View|Closure|string
    {
        return view('components.biletral-portal-aside.analytics-data');
    }
}
