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

    function makePrompt($cities, $fields)
    {

        $vertivals = new VerticalService();
        $verticals = $vertivals->getWithMatched($fields, true);
        $compare = '';

        if (count($cities) === 1) {
            $compare = $cities[0];
        } elseif (count($cities) === 2) {
            $compare = implode(' and ', $cities);
        } elseif (count($cities) > 2) {
            $last = array_pop($cities);
            $compare = implode(', ', $cities) . ', and ' . $last;
        }
        $subFilters = [];
        foreach ($verticals as  $sub) {
            $subFilters[] = $sub;
        }
        $filterText = '';
        if (count($subFilters) === 1) {
            $filterText = $subFilters[0];
        } elseif (count($subFilters) === 2) {
            $filterText = implode(' and ', $subFilters);
        } elseif (count($subFilters) > 2) {
            $last = array_pop($subFilters);
            $filterText = implode(', ', $subFilters) . ', and ' . $last;
        }



        $templates = config('sentences.prompt');


        $cityOnlyTemplates = config('sentences.cityOnlyPrompt');

        $filterOnlyTemplates = config('sentences.filterOnlyPrompt');

        if ($compare && $filterText) {
            $template = $templates[array_rand($templates)];
            $prompt = str_replace(
                [':cities', ':filters'],
                [$compare, $filterText],
                $template
            );
        } elseif ($compare) {
            $template = $cityOnlyTemplates[array_rand($cityOnlyTemplates)];
            $prompt = str_replace(':cities', $compare, $template);
        } elseif ($filterText) {
            $template = $filterOnlyTemplates[array_rand($filterOnlyTemplates)];
            $prompt = str_replace(':filters', $filterText, $template);
        } else {
            $prompt = '';
        }

        return trim($prompt);
    }

    public function geography(){
        return httpGet('/upamana/geograpgy-for-selection',[])['data'];
    }
}
