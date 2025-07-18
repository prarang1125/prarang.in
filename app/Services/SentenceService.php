<?php

namespace App\Services;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class SentenceService
{
    protected array $positiveJoiners = [
        "Moreover,",
        "Also,",
        "Interestingly,",
        "Notably,",
        "Also,",
        "Furthermore,",
        'Compared to',
    ];


    protected array $negativeJoiners = [
        "Unfortunately,",
        "Sadly,",
        "Regrettably,",
        "Disappointingly,",
        "It is unfortunate that",
        "Troublingly,",
        "In a worrying sign that,",
    ];
    protected array $starter = [
        'In comparison,',
        'Comparatively,',
        'In contrast,',
        'In a comparative context,',
    ];



    public function makeParagraphs(array $sentences, int $perParagraph = 3): array
    {
        $paragraphs = [];

        for ($i = 0; $i < count($sentences); $i += $perParagraph) {
            $group = array_slice($sentences, $i, $perParagraph);
            if (empty($group)) continue;

            $paragraph = $group[0];

            for ($j = 1; $j < count($group); $j++) {
                $sentence = $group[$j];

                $joiner = $this->chooseJoiner($sentence);
                $paragraph .= ' ' . $joiner . ' ' . $sentence;
            }

            $starter = Arr::random($this->starter);
            $sessionStarter = session('last_starter');

            if ($starter === $sessionStarter) {
                $filteredStarters = array_diff($this->starter, [$starter]);
                $starter = Arr::random($filteredStarters);
            }

            session(['last_starter' => $starter]);

            $paragraphs[] = $starter . ' ' . $paragraph;
        }

        return $paragraphs;
    }

    protected function chooseJoiner(string $sentence): string
    {
        // Basic check for negative keywords
        $negativeIndicators = ['worst ranked', 'poor', 'lower', 'less', 'not', 'lowest', 'worst'];
        foreach ($negativeIndicators as $word) {
            if (stripos($sentence, $word) !== false) {
                $lastIndex = session('last_negative_joiner_index');
                $newIndex = array_rand($this->negativeJoiners);
                while ($newIndex == $lastIndex) {
                    $newIndex = array_rand($this->negativeJoiners);
                }
                session(['last_negative_joiner_index' => $newIndex]);
                return $this->negativeJoiners[$newIndex];
            }
        }
        $lastIndex = session('last_positive_joiner_index');
        $newIndex = array_rand($this->positiveJoiners);
        while ($newIndex == $lastIndex) {
            $newIndex = array_rand($this->positiveJoiners);
        }
        session(['last_positive_joiner_index' => $newIndex]);
        return $this->positiveJoiners[$newIndex];
    }


    public function makeOutput($location, $items)
    {

        $html = '';
        $html .= "{location['name']}";

        foreach ($items as $item => $value) {
            $html .= implode("\n", $value);
        }
    }

    function makePrompt(array $cities, array $fields): string
    {

        $verticals = httpGet('/upamana/get-metched-verticals', ['fields' => $fields])['data'];

        $localizedCities = $this->localizeArray($cities, 'location');

        $localizedFilters = [];

        foreach ($verticals as $code => $label) {
            $key = $this->slugifyToKey($label);
            $translation = __("metrics.$key");
            $localizedFilters[] = $translation !== "metrics.$key" ? $translation : $label;
        }

        $and = __('messages.and');

        $compare = '';
        if (count($localizedCities) === 1) {
            $compare = $localizedCities[0];
        } elseif (count($localizedCities) === 2) {
            $compare = implode(" $and ", $localizedCities);
        } elseif (count($localizedCities) > 2) {
            $last = array_pop($localizedCities);
            $compare = implode(', ', $localizedCities) . " $and " . $last;
        }

        $filterText = '';
        if (count($localizedFilters) === 1) {
            $filterText = $localizedFilters[0];
        } elseif (count($localizedFilters) === 2) {
            $filterText = implode(" $and ", $localizedFilters);
        } elseif (count($localizedFilters) > 2) {
            $last = array_pop($localizedFilters);
            $filterText = implode(', ', $localizedFilters) . " $and " . $last;
        }

        // 6. Load templates
        $templates = __('messages.prompts');
        $cityOnlyTemplates = __('messages.cityOnlyPrompt');
        $filterOnlyTemplates = __('messages.filterOnlyPrompt');

        $templates = is_array($templates) ? $templates : [$templates];
        $cityOnlyTemplates = is_array($cityOnlyTemplates) ? $cityOnlyTemplates : [$cityOnlyTemplates];
        $filterOnlyTemplates = is_array($filterOnlyTemplates) ? $filterOnlyTemplates : [$filterOnlyTemplates];

        // 7. Generate prompt
        if ($compare && $filterText) {
            $template = $templates[array_rand($templates)];
            $prompt = strtr($template, [':cities' => $compare, ':filters' => $filterText]);
        } elseif ($compare) {
            $template = $cityOnlyTemplates[array_rand($cityOnlyTemplates)];
            $prompt = strtr($template, [':cities' => $compare]);
        } elseif ($filterText) {
            $template = $filterOnlyTemplates[array_rand($filterOnlyTemplates)];
            $prompt = strtr($template, [':filters' => $filterText]);
        } else {
            $prompt = '';
        }

        return trim($prompt);
    }

    public function geography()
    {

        return httpGet('/upamana/geograpgy-for-selection', ['locale' => app()->getLocale()])['data'];
    }


    function localizeArray(array $items, string $domain): array
    {
        return array_map(function ($item) use ($domain) {
            $key = strtolower(str_replace([' ', '-'], '_', $item));
            $translated = __("$domain.$key");
            return $translated !== "$domain.$key" ? $translated : $item;
        }, $items);
    }
    function slugifyToKey(string $label): string
    {
        // Step 1: Replace special characters for consistency
        $label = str_replace('%', '%', $label); // keep percent sign as-is
        $label = str_replace(['/', '-', '&'], ['_', '_', 'and'], $label);

        // Step 2: Remove any character that’s not A-Z, a-z, 0-9, space, or punctuation needed for keys
        $label = preg_replace('/[^A-Za-z0-9\s()_%]/u', '', $label);

        // Step 3: Replace spaces with underscores
        $label = preg_replace('/\s+/', '_', $label);

        return trim($label, '_');
    }
}
