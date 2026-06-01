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
            }
            if ($this->step < 5) {
                $this->redirectRoute('partners.step-2', $this->hashId);
            }
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
            'LAN17' => 'English (Multilingualism)',
        ];
        return view('livewire.pages.partners.india-city-village-step-five', [
            'lang_titles' => $langTitle
        ])->layout('components.layout.main.base', [
            'metaData' => [
                'nav-heading' => 'India - Cities & Villages: Digital Marketing',
                'nav-sub-heading' => ""
            ],
        ]);
    }
}
