<?php

namespace App\Livewire\Pages\Partners;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Illuminate\Http\Request;

class IndiaCityVillageStepFive extends Component
{
    public $step = 5;
    public $cityData = [];
    public $sourceData = [];
    public $selectedLanguages = [];
    public $selectedPlans = [];
    public $cirusData = null;
    public $hashId = null;
    public $selectedCityPosts = [];
    public $selectedYellowPages = [];
    public $selectedOutdoorAds = [];
    public $selectedDistrictAnalytics = [];
    public $selectedSemiotics = [];
    public $selectedPartnerMetrics = [];

    public $cities = [];
    public $villages = [];
    public $tableData = [];
    public $totalOneTimeCost = 0;
    public $totalMonthlyCost = 0;

    public $name;
    public $mobile;
    public $email;
    public $company_name;
    public $website;
    public $isSubmitted = false;
    public $showPlansModal = false;
    public $shareUrl = "";

    public function mount(Request $request, $hashId = null)
    {

        $this->hashId = $hashId;
        if (!$hashId and !$request->isMethod('post')) {
            $this->redirectRoute('partners.india-town');
            return;
        }

        if ($this->hashId) {
            $record = DB::table('partner-plan-ref')
                ->where('hash_id', $this->hashId)
                ->first();

            if ($record) {
                $data = json_decode($record->data, true);

                $this->selectedLanguages         = $data['selectedLanguages'] ?? [];
                $this->selectedPlans             = $data['selectedPlans'] ?? [];

                $this->selectedCityPosts         = $data['selectedCityPosts'] ?? [];
                $this->selectedYellowPages       = $data['selectedYellowPages'] ?? [];
                $this->selectedOutdoorAds        = $data['selectedOutdoorAds'] ?? [];
                $this->selectedDistrictAnalytics = $data['selectedDistrictAnalytics'] ?? [];
                $this->selectedSemiotics         = $data['selectedSemiotics'] ?? [];
                $this->selectedPartnerMetrics    = $data['selectedPartnerMetrics'] ?? [];

                $this->cities                    = $data['cities'] ?? [];
                $this->villages                  = $data['villages'] ?? [];

                $this->cityData                  = $data['cityData'] ?? [];
                $this->sourceData                = $data['sourceData'] ?? [];

                $this->step = $record->step ?? 5;
                $this->prepareTableData();
            }
            if ($this->step == 4) {
                return;
            }
            if ($this->step < 5) {
                $this->redirectRoute('partners.step-2', $this->hashId);
            }
        }
    }

    protected function prepareTableData()
    {
        $pricing = config('data.partners-filter.pricing');
        $basePricing = $pricing['base'] ?? [];
        $optionalPricing = $pricing['optional_solutions'] ?? [];

        $this->tableData = [];
        $this->totalOneTimeCost = 0;
        $this->totalMonthlyCost = 0;

        $serial = 1;
        $processedPlans = [];

        $langTitle = [
            'LAN3'  => 'Assamese',
            'LAN4'  => 'Bengali',
            'LAN5'  => 'Hindi',
            'LAN6'  => 'Gurumukhi',
            'LAN7'  => 'Kannada',
            'LAN8'  => 'Malayalam',
            'LAN9'  => 'Marathi',
            'LAN10' => 'Gujarati',
            'LAN11' => 'Odia',
            'LAN12' => 'Urdu',
            'LAN13' => 'Tamil',
            'LAN14' => 'Telugu',
            'LAN17' => 'English (Multilingualism)',
        ];

        foreach ($this->cityData as $distId => $group) {

            $locations = [];

            if (!empty($group['dhq'])) {
                $locations[] = $group['dhq'];
            }

            if (!empty($group['towns'])) {
                $locations = array_merge($locations, $group['towns']);
            }

            if (!empty($group['villages'])) {
                $locations = array_merge($locations, $group['villages']);
            }

            $stateRows = [];
            $stateRowspan = 0;

            $subSerial = 'A';

            foreach ($locations as $idx => $loc) {

                $locId   = $loc['city_id'] ?? $loc['village_code'] ?? ($distId . '_' . $idx);
                $locName = $loc['city_name'] ?? $loc['village_name'] ?? 'Unknown';
                $locType = $loc['location_type'] ?? 'Unknown';

                // FIX #1
                $state = $loc['demo']['MSTR1'] ?? '-';

                $cityRows = [];
                $cityRowspan = 0;

                foreach ($this->selectedLanguages as $key => $isSelected) {

                    if (!$isSelected) {
                        continue;
                    }

                    $parts = explode('-', $key);

                    if (count($parts) != 2) {
                        continue;
                    }

                    [$distIdFromKey, $langCode] = $parts;

                    if ($distIdFromKey != $distId) {
                        continue;
                    }

                    $langName = $langTitle[$langCode] ?? $langCode;

                    // FIX #2
                    // Determine serial part without language for row grouping
                    $serialPart = $locType === 'District Capital'
                        ? (string)$serial
                        : $serial . '.' . $subSerial;
                    $sNo = $serialPart; // serial number column
                    $language = $langName; // separate language column

                    $planKey = $locId . '-' . $langCode;

                    $hostValue = $this->selectedPlans[$planKey] ?? '';
                    if (empty($hostValue)) {
                        $hostValue = $locId . '-' . $langCode . '-prarang';
                        $this->selectedPlans[$planKey] = $hostValue;
                    }

                    $hostLocation = 'Prarang.in';

                    if (str_ends_with($hostValue, '-yourwebsite')) {
                        $hostLocation = 'Your Website';
                    } elseif (str_ends_with($hostValue, '-newwebsite')) {
                        $hostLocation = 'New Website';
                    }

                    $optionalSolutions = [];

                    $cityPostValue = $this->selectedCityPosts[$planKey] ?? '';
                    $hasYellowPages = !empty($this->selectedYellowPages[$planKey]);
                    $hasOutdoorAds = !empty($this->selectedOutdoorAds[$planKey]);

                    if (str_ends_with($cityPostValue, '-weekly')) {
                        $optionalSolutions[] = '4 Posts/Month (Weekly)';
                        if ($hasYellowPages) {
                            $optionalSolutions[] = 'City Yellow Pages (DM)';
                        }
                        if ($hasOutdoorAds) {
                            $optionalSolutions[] = 'City Outdoor Ad Analytics';
                        }
                        $optionalSolutions[] = 'Semiotics';
                        $optionalSolutions[] = 'Partner Metrics';
                    } elseif (str_ends_with($cityPostValue, '-alternateday')) {
                        $optionalSolutions[] = '15 Posts/Month (Alternate Day)';
                        if ($hasYellowPages) {
                            $optionalSolutions[] = 'City Yellow Pages (DM)';
                        }
                        if ($hasOutdoorAds) {
                            $optionalSolutions[] = 'City Outdoor Ad Analytics';
                        }
                        $optionalSolutions[] = 'Semiotics';
                        $optionalSolutions[] = 'Partner Metrics';
                    } elseif (str_ends_with($cityPostValue, '-daily')) {
                        $optionalSolutions[] = '31 Posts/Month (Daily)';
                        if ($hasYellowPages) {
                            $optionalSolutions[] = 'City Yellow Pages (DM)';
                        }
                        if ($hasOutdoorAds) {
                            $optionalSolutions[] = 'City Outdoor Ad Analytics';
                        }
                        $optionalSolutions[] = 'District Metrics';
                        $optionalSolutions[] = 'Semiotics';
                        $optionalSolutions[] = 'Partner Metrics';
                    } else {
                        if ($hasYellowPages) {
                            $optionalSolutions[] = 'City Yellow Pages (DM)';
                        }
                        if ($hasOutdoorAds) {
                            $optionalSolutions[] = 'City Outdoor Ad Analytics';
                        }
                    }

                    $isFree = false;
                    if ($locType === 'District Capital') {
                        $hasSubLocations = !empty($group['towns']) || !empty($group['villages']);
                        if ($hasSubLocations && $hostLocation === 'Prarang.in') {
                            $isFree = true;
                        }
                    }

                    $oneTime = $isFree ? 0 : ($basePricing[$hostLocation]['one_time'] ?? 0);
                    $monthly = $isFree ? 0 : ($basePricing[$hostLocation]['monthly'] ?? 0);

                    foreach ($optionalSolutions as $solution) {
                        $monthly += $optionalPricing[$solution]['monthly'] ?? 0;
                    }

                    // FIX #3
                    if (!isset($processedPlans[$planKey])) {

                        $this->totalOneTimeCost += $oneTime;
                        $this->totalMonthlyCost += $monthly;

                        $processedPlans[$planKey] = true;
                    }

                    $cityRows[] = [
                        's_no'               => $sNo,
                        'language'           => $language,
                        'city'               => $locName,
                        'city_type'          => $locType,
                        'state'              => $state,
                        'host_location'      => $hostLocation,
                        'standard_solutions' => true,
                        'optional_solutions' => empty($optionalSolutions)
                            ? '-'
                            : implode(', ', $optionalSolutions),
                        'one_time_cost'      => $oneTime,
                        'monthly_cost'       => $monthly,
                        'loc_id'             => $locId,
                        'is_first_in_city'   => false,
                        'city_rowspan'       => 0,
                        'is_first_in_state'  => false,
                        'state_rowspan'      => 0,
                        'is_first_in_sr'     => false,
                        'sr_rowspan'         => 0,
                    ];

                    $cityRowspan++;
                    $stateRowspan++;
                }

                if ($cityRowspan > 0) {

                    $cityRows[0]['is_first_in_city'] = true;
                    $cityRows[0]['city_rowspan'] = $cityRowspan;
                    // Set serial row span for the first language row of this location
                    $cityRows[0]['is_first_in_sr'] = true;
                    $cityRows[0]['sr_rowspan'] = $cityRowspan;

                    $stateRows = array_merge($stateRows, $cityRows);
                }

                if ($locType !== 'District Capital') {
                    $subSerial++;
                }
            }

            if ($stateRowspan > 0) {

                $stateRows[0]['is_first_in_state'] = true;
                $stateRows[0]['state_rowspan'] = $stateRowspan;

                $this->tableData = array_merge(
                    $this->tableData,
                    $stateRows
                );
            }

            $serial++;
        }
    }

    public function changeStep($move = 'back')
    {
        if ($move == 'back') {
            DB::table('partner-plan-ref')->updateOrInsert(
                ['hash_id' => $this->hashId],
                [
                    'step' => 4,
                    'updated_at' => now(),
                ]
            );
            return redirect()->route('partners.step-2', ['hashId' => $this->hashId]);
        }
    }

    public function createShareLink()
    {

        $payload = [
            'selectedLanguages'         => $this->selectedLanguages,
            'selectedPlans'             => $this->selectedPlans,

            'selectedCityPosts'         => $this->selectedCityPosts,
            'selectedYellowPages'       => $this->selectedYellowPages,
            'selectedOutdoorAds'        => $this->selectedOutdoorAds,
            'selectedDistrictAnalytics' => $this->selectedDistrictAnalytics,
            'selectedSemiotics'         => $this->selectedSemiotics,
            'selectedPartnerMetrics'    => $this->selectedPartnerMetrics,

            'cities'                    => $this->cities,
            'villages'                  => $this->villages,

            'cityData'                  => $this->cityData,
            'sourceData'                => $this->sourceData,
        ];

        DB::table('partner-plan-ref')->updateOrInsert(
            ['hash_id' => $this->hashId],
            [
                'data' => json_encode($payload),
                'step' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        $this->shareUrl = route('partners.step-5', ['hashId' => $this->hashId]);
    }

    public function confirmFinalStep()
    {
        // Add logic to proceed to Step 6 if needed
        // For now, redirect or just update step in DB
        $this->step = 6;
        // DB::table('partner-plan-ref')->updateOrInsert(
        //     ['hash_id' => $this->hashId],
        //     [
        //         'step' => $this->step,
        //         'updated_at' => now(),
        //     ]
        // );
        // // Assuming there will be a step 6 route
        // // return redirect()->route('partners.step-6', ['hashId' => $this->hashId]);
        // session()->flash('message', 'Proceeded to Step 6 successfully.');
    }
    public function getLanguageTitle($code)
    {
        $langTitle = [
            'LAN3' => 'Assamese',
            'LAN4' => 'Bengali',
            'LAN5' => 'Hindi',
            'LAN6' => 'Gurumukhi',
            'LAN7' => 'Kannada',
            'LAN8' => 'Malayalam',
            'LAN9' => 'Marathi',
            'LAN10' => 'Gujarati',
            'LAN11' => 'Odia',
            'LAN12' => 'Urdu',
            'LAN13' => 'Tamil',
            'LAN14' => 'Telugu',
            'LAN17' => 'English ',
        ];

        return $langTitle[$code] ?? $code;
    }

    public function sendEnrolment()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'mobile' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'company_name' => 'nullable|string|max:255',
            'website' => 'nullable|string|max:255',
        ]);

        $dataToSave = [
            'selectedLanguages'         => $this->selectedLanguages,
            'selectedPlans'             => $this->selectedPlans,
            'selectedCityPosts'         => $this->selectedCityPosts,
            'selectedYellowPages'       => $this->selectedYellowPages,
            'selectedOutdoorAds'        => $this->selectedOutdoorAds,
            'selectedDistrictAnalytics' => $this->selectedDistrictAnalytics,
            'selectedSemiotics'         => $this->selectedSemiotics,
            'selectedPartnerMetrics'    => $this->selectedPartnerMetrics,
            'cities'                    => $this->cities,
            'villages'                  => $this->villages,
            'cityData'                  => $this->cityData,
            'sourceData'                => $this->sourceData,
        ];

        if (empty($this->hashId)) {
            $this->hashId = 'SID_' . date('d-m-Y') . '_' . \Illuminate\Support\Str::upper(\Illuminate\Support\Str::random(10));
        }

        \Illuminate\Support\Facades\DB::table('partner-plan-ref')->updateOrInsert(
            ['hash_id' => $this->hashId],
            [
                'data' => json_encode($dataToSave),
                'step' => 5,
                'updated_at' => now(),
            ]
        );

        $shareUrl = route('partners.step-5', ['hashId' => $this->hashId]);

        $enrolmentData = [
            'name' => $this->name,
            'mobile' => $this->mobile,
            'email' => $this->email,
            'company_name' => $this->company_name,
            'website' => $this->website,
            'tableData' => $this->tableData,
            'totalOneTimeCost' => $this->totalOneTimeCost,
            'totalMonthlyCost' => $this->totalMonthlyCost,
            'date' => date('d M, Y'),
            'shareUrl' => $shareUrl,
        ];

        try {
            $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('emails.partner-enrolment', ['data' => $enrolmentData])
                ->setPaper('a4', 'landscape');
            $pdfContent = $pdf->output();

            \Illuminate\Support\Facades\Mail::to('sales@prarang.in')
                ->cc([
                    $this->email,
                ])
                ->send(new \App\Mail\PartnerEnrolmentMail($enrolmentData, $pdfContent));

            $this->isSubmitted = true;
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Failed to send mail: ' . $e->getMessage());
            session()->flash('error', 'Failed to send email: ' . $e->getMessage());
        }
    }

    public function render()
    {
        $langTitle = [
            'LAN3' => 'Assamese',
            'LAN4' => 'Bengali',
            'LAN5' => 'Hindi',
            'LAN6' => 'Gurumukhi',
            'LAN7' => 'Kannada',
            'LAN8' => 'Malayalam',
            'LAN9' => 'Marathi',
            'LAN10' => 'Gujarati',
            'LAN11' => 'Odia',
            'LAN12' => 'Urdu',
            'LAN13' => 'Tamil',
            'LAN14' => 'Telugu',
            'LAN17' => 'English',
        ];
        return view('livewire.pages.partners.india-city-village-step-five', [
            'lang_titles' => $langTitle
        ])->layout('components.layout.main.base', [
            'metaData' => [
                'nav-heading' => 'Select India Knowledge Webs for Partnerships',
                'nav-sub-heading' => "",
                'image' => "https://i.ibb.co/BHRqJZgW/eeps.png"
            ],
        ]);
    }
}
