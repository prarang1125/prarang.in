<x-partners.city-village-frame :step="$step">
    @if($step == 5)
    <style>
        /* Table Data */
        .compact-table tbody td {
            text-align: center;
        }

        /* Table Data */
        .compact-table tbody td:nth-child(1) {
            text-align: left;
            padding-left: 12px !important;
        }

        /* Table Data */
        .compact-table tbody td {
            font-size: 14px;
        }

        /* Th */
        .compact-table tr th {
            font-size: 14px;
        }
    </style>
    @section('p-header')
    <div class="text-center space-y-2">
        <p class="text-xl font-semibold text-blue-600 border-b-2 border-blue-600 pb-1 inline-block mb-0">
            5. Select KW Estimated Budget
        </p>
    </div>

    @endsection
    <div class="p-2">
        <div class="table-responsive">
            <table class="table compact-table table-bordered  table-sm">
                <thead class="table-light">
                    <tr>
                        <th rowspan="2" class="align-middle text-start">S. No.</th>
                        <th rowspan="2" class="align-middle text-start">City</th>
                        <th rowspan="2" class="align-middle">State</th>
                        <th rowspan="2" class="align-middle">Selected Language</th>
                        <th rowspan="2" class="align-middle">Selected Host Location</th>
                        <th colspan="2" class="align-middle">Selected Solution</th>
                        <th colspan="2" class="align-middle">Estimated Budget</th>
                    </tr>
                    <tr>
                        <th>Standard<br>Solutions</th>
                        <th>City-Interaction Solutions</th>
                        <th>One Time<br>Cost</th>
                        <th>Monthly*<br>Cost</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $currentCity = null;
                    $currentState = null;
                    $cityRowspan = 0;
                    $stateRowspan = 0;
                    @endphp

                    @foreach($tableData as $index => $row)
                    <tr>
                        @if($row['is_first_in_sr'])
                        <td rowspan="{{ $row['sr_rowspan'] }}" class="align-middle">
                            {{ $row['s_no'] }}
                        </td>
                        @endif

                        @if($row['is_first_in_city'])
                        <td rowspan="{{ $row['city_rowspan'] }}" class="align-middle">
                            <strong>{{ $row['city'] }}</strong>
                            <br>
                            <small class="text-muted">({{ $row['city_type'] }})</small>
                        </td>
                        @endif

                        @if($row['is_first_in_state'])
                        <td rowspan="{{ $row['state_rowspan'] }}" class="align-middle">{{ $row['state'] }}</td>
                        @endif
                        <td>{{$row['language']}}</td>

                        <td>{{ $row['host_location'] }}</td>

                        <td>
                            @if($row['standard_solutions'])
                            <span class="text-success font-bold text-lg">✓</span>
                            @else
                            -
                            @endif
                        </td>

                        <td>
                            {{ $row['optional_solutions'] }}
                        </td>

                        <td>
                            @if($row['one_time_cost'] > 0)
                            ₹ {{ number_format($row['one_time_cost']) }}
                            @else
                            ₹ -
                            @endif
                        </td>

                        <td>
                            ₹ {{ number_format($row['monthly_cost']) }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot class="table-light font-weight-bold">
                    <tr>
                        <td colspan="7" class="text-start ps-3"><strong>Total: {{ count($tableData) }}</strong></td>
                        {{-- <td colspan="2"></td> --}}
                        <td><strong>₹ {{ number_format($totalOneTimeCost) }}</strong></td>
                        <td><strong>₹ {{ number_format($totalMonthlyCost) }}</strong></td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="text-xs p-2 border">* This is merely an estimated budget for a 1-month subscription (based on recent (dynamic daily) social media location pricing). Send a Partner Request to convert the estimate to a special Prarang Pricing Offer for you.
            Applicable taxes (e.g., GST) will be added to the pricing offer.
        </div>
        @section('p-footer')
        <div class="d-flex justify-content-between mt-4 align-items-center w-100">

            <button wire:click="changeStep('back')" wire:loading.attr="disabled" class="btn btn-secondary"
                style="min-width: 120px;">
                <span wire:loading.remove wire:target="changeStep('back')"><i class="bi bi-arrow-left me-2"></i> Revise Plan</span>
                <span wire:loading wire:target="changeStep('back')">
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                </span>
            </button>
            <div class="d-flex justify-content-between gap-2">

                <!-- <button type="button" wire:click="$set('showPlansModal', true)" wire:loading.attr="disabled"
                    class="btn btn-primary" style="min-width: 100px;">
                    <span wire:loading.remove wire:target="$set('showPlansModal', true)">Plans Details</span>
                    <span wire:loading wire:target="$set('showPlansModal', true)">
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    </span>
                </button> -->
                <button wire:click="createShareLink" wire:loading.attr="disabled" wire:target="createShareLink"
                    class="text-white   border-blue-600 bg-blue-600 hover:bg-blue-500 transition-colors px-6 py-2 rounded-lg font-medium shadow-sm flex items-center justify-center gap-2">
                    <span wire:loading.remove wire:target="createShareLink" class="flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z">
                            </path>
                        </svg>
                        <span>Share</span>
                    </span>
                    <span wire:loading wire:target="createShareLink" class="flex items-center gap-2">
                        <svg class="animate-spin w-4 h-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
                            </circle>
                            <path class="opacity-75" fill="currentColor"
                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                            </path>
                        </svg>
                    </span>
                </button>

            </div>

            <button wire:click="confirmFinalStep"
                x-on:click="window.scrollTo({ top: 30, behavior: 'smooth' })"
                wire:loading.attr="disabled" class="btn btn-primary"
                style="min-width: 100px;">
                <span wire:loading.remove wire:target="confirmFinalStep">Partner Request</span>
                <span wire:loading wire:target="confirmFinalStep">
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                </span>
            </button>

        </div>
        @endsection
    </div>
    @else
    <style>
        /* Paragraph */
        .pf-header p {
            color: #0070C0;
            border-color: #0070C0;
        }
    </style>
    @section('p-header')
    <div class="text-center space-y-2">
        <p class="text-xl font-semibold text-blue-600 border-b-2 border-blue-600 pb-1 inline-block mb-0">
            6. Prarang Partnership


        </p>
    </div>

    @endsection

    <div class="bg-white max-w-2xl w-full mx-auto border border-gray-200 p-6 sm:p-8 rounded-lg shadow-sm">
        @if(!$isSubmitted)
        <!-- Form Header -->
        <div class="mb-6">
            <div
                class=" flex justify-start items-start flex-col rounded  p-2 text-sm border border-gray-400 bg-gray-50">
                <p><b>Your Message to – Prarang Sales:</b> <br><br> We are interested in partnering with Prarang for the selected Knowledge Web Geographies by language below. Our preference for respective KW for the Standard Solution and the Optional City-Interaction Solution is also indicated in the selection.
                    <br>Thanks<br>
                </p>
            </div>
        </div>
        @endif

        <div>
            @if($isSubmitted)
            <div class="py-8 text-center">
                <div
                    class="w-16 h-16 bg-green-50 text-green-600 rounded-full flex items-center justify-center mx-auto mb-4 border border-green-200">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                        </path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Thank You</h3>
                <p class="text-gray-600 text-sm mb-6">The mail has also been emailed to <a
                        href="mailto:sales@prarang.in">sales@prarang.in</a>.
                    We will revert to you within a week.
                </p>
                {{-- <button
                    class="px-6 py-2 bg-gray-100 hover:bg-gray-200 text-gray-800 font-medium rounded transition-colors text-sm border border-gray-300">

                </button> --}}
            </div>
            @else
            <form wire:submit.prevent="sendEnrolment" class="space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Name -->
                    <div class="space-y-1">
                        <label for="name" class="block text-sm font-semibold text-gray-700">Full Name</label>
                        <input type="text" id="name" wire:model.defer="name" placeholder="E.g. John Doe"
                            class="w-full px-3 py-2 bg-white border border-gray-300 rounded focus:ring-1 focus:ring-blue-500 focus:border-blue-500 outline-none text-gray-800 text-sm transition-colors">
                        @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                    <!-- Mobile -->
                    <div class="space-y-1">
                        <label for="mobile" class="block text-sm font-semibold text-gray-700">Mobile Number</label>
                        <input type="text" id="mobile" wire:model.defer="mobile" placeholder="+91 XXXXX XXXXX"
                            class="w-full px-3 py-2 bg-white border border-gray-300 rounded focus:ring-1 focus:ring-blue-500 focus:border-blue-500 outline-none text-gray-800 text-sm transition-colors">
                        @error('mobile') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                </div>

                <!-- Email -->
                <div class="space-y-1">
                    <label for="email" class="block text-sm font-semibold text-gray-700">Business Email</label>
                    <input type="email" id="email" wire:model.defer="email" placeholder="name@company.com"
                        class="w-full px-3 py-2 bg-white border border-gray-300 rounded focus:ring-1 focus:ring-blue-500 focus:border-blue-500 outline-none text-gray-800 text-sm transition-colors">
                    @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <!-- Company Name -->
                <div class="space-y-1">
                    <label for="company_name" class="block text-sm font-semibold text-gray-700">Company Name</label>
                    <input type="text" id="company_name" wire:model.defer="company_name"
                        placeholder="Your organization name"
                        class="w-full px-3 py-2 bg-white border border-gray-300 rounded focus:ring-1 focus:ring-blue-500 focus:border-blue-500 outline-none text-gray-800 text-sm transition-colors">
                    @error('company_name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <!-- Website -->
                <div class="space-y-1">
                    <label for="website" class="block text-sm font-semibold text-gray-700">Website URL <span
                            class="text-gray-400 font-normal">(Optional)</span></label>
                    <input type="text" id="website" wire:model.defer="website" placeholder="https://www.yourwebsite.com"
                        class="w-full px-3 py-2 bg-white border border-gray-300 rounded focus:ring-1 focus:ring-blue-500 focus:border-blue-500 outline-none text-gray-800 text-sm transition-colors">
                    @error('website') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <!-- Action Buttons -->
                <div class="pt-4 flex items-center justify-between gap-4 mt-2">
                    <button wire:click="changeStep('back')" wire:loading.attr="disabled" class="btn btn-secondary"
                        style="min-width: 120px;">
                        <span wire:loading.remove wire:target="changeStep('back')">Revise Plan</span>
                        <span wire:loading wire:target="changeStep('back')">
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        </span>
                    </button>

                    <button type="submit" wire:loading.attr="disabled"
                        class="px-6 py-2 bg-green-600 hover:bg-green-700 text-white font-medium rounded shadow-sm text-sm transition-colors flex items-center gap-2 disabled:opacity-70">
                        <span wire:loading.remove wire:target="sendEnrolment">Send</span>
                        <span wire:loading wire:target="sendEnrolment" class="flex items-center gap-2">
                            <svg class="animate-spin h-4 w-4 text-white" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                    stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor"
                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                </path>
                            </svg>

                        </span>
                    </button>
                </div>
            </form>
            @endif
        </div>
        @endif

        @if($showPlansModal)
        <div
            style="position: fixed; top: 0; left: 0; right: 0; bottom: 0; z-index: 9999; background: rgba(0, 0, 0, 0.6); display: flex; align-items: center; justify-content: center; padding: 20px; backdrop-filter: blur(4px);">
            <div
                style="background: white; border-radius: 12px; max-width: 900px; width: 100%; box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04); overflow: hidden; border: 1px solid #e5e7eb; display: flex; flex-direction: column; max-height: 90vh;">
                <!-- Header -->
                <div
                    style="padding: 20px; border-bottom: 1px solid #e5e7eb; display: flex; justify-content: space-between; align-items: center; background: #f8fafc;">
                    <h3
                        style="margin: 0; font-size: 1.25rem; font-weight: 700; color: #1e293b; display: flex; align-items: center; gap: 8px;">
                        <i class="fas fa-list-check" style="color: #2563eb;"></i> Plan Inclusions & Deliverables
                    </h3>
                    <button type="button" wire:click="$set('showPlansModal', false)"
                        style="background: transparent; border: none; font-size: 1.5rem; color: #64748b; cursor: pointer; line-height: 1; padding: 0 5px;">&times;</button>
                </div>
                <!-- Body -->
                <div style="padding: 24px; overflow-y: auto; flex: 1;">
                    <div style="overflow-x: auto; border: 1px solid #e2e8f0; border-radius: 8px;">
                        <table style="width: 100%; border-collapse: collapse; text-align: left; font-size: 14px;">
                            <thead>
                                <tr style="background: #f1f5f9; border-bottom: 2px solid #e2e8f0;">
                                    <th
                                        style="padding: 12px 16px; font-weight: 700; color: #334155; border-right: 1px solid #e2e8f0; width: 35%;">
                                        FEATURE</th>
                                    <th
                                        style="padding: 12px 16px; font-weight: 700; color: #334155; text-align: center; border-right: 1px solid #e2e8f0;">
                                        Weekly Posts</th>
                                    <th
                                        style="padding: 12px 16px; font-weight: 700; color: #334155; text-align: center; border-right: 1px solid #e2e8f0;">
                                        Alternate Day Posts</th>
                                    <th
                                        style="padding: 12px 16px; font-weight: 700; color: #334155; text-align: center;">
                                        Daily Posts</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Category 1 -->
                                <tr
                                    style="background: #f8fafc; font-weight: 700; color: #475569; border-bottom: 1px solid #e2e8f0;">
                                    <td colspan="4" style="padding: 8px 16px; font-size: 12px; letter-spacing: 0.05em;">
                                        REACH & BASE</td>
                                </tr>
                                <tr style="border-bottom: 1px solid #e2e8f0;">
                                    <td
                                        style="padding: 12px 16px; color: #475569; font-weight: 500; border-right: 1px solid #e2e8f0;">
                                        Min. city subscriber base</td>
                                    <td
                                        style="padding: 12px 16px; text-align: center; color: #0f172a; font-weight: 600; border-right: 1px solid #e2e8f0;">
                                        300+</td>
                                    <td
                                        style="padding: 12px 16px; text-align: center; color: #0f172a; font-weight: 600; border-right: 1px solid #e2e8f0;">
                                        300+</td>
                                    <td
                                        style="padding: 12px 16px; text-align: center; color: #0f172a; font-weight: 600;">
                                        10,000+</td>
                                </tr>
                                <tr style="border-bottom: 1px solid #e2e8f0;">
                                    <td
                                        style="padding: 12px 16px; color: #475569; font-weight: 500; border-right: 1px solid #e2e8f0;">
                                        Hyperlocal reach per post (7 days)</td>
                                    <td
                                        style="padding: 12px 16px; text-align: center; color: #0f172a; border-right: 1px solid #e2e8f0;">
                                        3,000+</td>
                                    <td
                                        style="padding: 12px 16px; text-align: center; color: #0f172a; border-right: 1px solid #e2e8f0;">
                                        3,000+</td>
                                    <td style="padding: 12px 16px; text-align: center; color: #0f172a;">3,000+</td>
                                </tr>
                                <tr style="border-bottom: 1px solid #e2e8f0;">
                                    <td
                                        style="padding: 12px 16px; color: #475569; font-weight: 500; border-right: 1px solid #e2e8f0;">
                                        Total monthly reach</td>
                                    <td
                                        style="padding: 12px 16px; text-align: center; color: #0f172a; border-right: 1px solid #e2e8f0;">
                                        12,000+</td>
                                    <td
                                        style="padding: 12px 16px; text-align: center; color: #0f172a; border-right: 1px solid #e2e8f0;">
                                        45,000+</td>
                                    <td style="padding: 12px 16px; text-align: center; color: #0f172a;">93,000+</td>
                                </tr>

                                <!-- Category 2 -->
                                <tr
                                    style="background: #f8fafc; font-weight: 700; color: #475569; border-bottom: 1px solid #e2e8f0;">
                                    <td colspan="4" style="padding: 8px 16px; font-size: 12px; letter-spacing: 0.05em;">
                                        CONTENT & POSTING</td>
                                </tr>
                                <tr style="border-bottom: 1px solid #e2e8f0;">
                                    <td
                                        style="padding: 12px 16px; color: #475569; font-weight: 500; border-right: 1px solid #e2e8f0;">
                                        Posts per month</td>
                                    <td
                                        style="padding: 12px 16px; text-align: center; color: #0f172a; border-right: 1px solid #e2e8f0;">
                                        4</td>
                                    <td
                                        style="padding: 12px 16px; text-align: center; color: #0f172a; border-right: 1px solid #e2e8f0;">
                                        15</td>
                                    <td style="padding: 12px 16px; text-align: center; color: #0f172a;">31</td>
                                </tr>
                                <tr style="border-bottom: 1px solid #e2e8f0;">
                                    <td
                                        style="padding: 12px 16px; color: #475569; font-weight: 500; border-right: 1px solid #e2e8f0;">
                                        Monthly posting frequency</td>
                                    <td
                                        style="padding: 12px 16px; text-align: center; color: #0f172a; border-right: 1px solid #e2e8f0;">
                                        Weekly</td>
                                    <td
                                        style="padding: 12px 16px; text-align: center; color: #0f172a; border-right: 1px solid #e2e8f0;">
                                        Alternate day</td>
                                    <td style="padding: 12px 16px; text-align: center; color: #0f172a;">Daily</td>
                                </tr>
                                <tr style="border-bottom: 1px solid #e2e8f0;">
                                    <td
                                        style="padding: 12px 16px; color: #475569; font-weight: 500; border-right: 1px solid #e2e8f0;">
                                        Creative formats included</td>
                                    <td
                                        style="padding: 12px 16px; text-align: center; color: #0f172a; border-right: 1px solid #e2e8f0;">
                                        3 stills, 1 video</td>
                                    <td
                                        style="padding: 12px 16px; text-align: center; color: #0f172a; border-right: 1px solid #e2e8f0;">
                                        13 stills, 2 videos</td>
                                    <td style="padding: 12px 16px; text-align: center; color: #0f172a;">27 stills, 4
                                        videos</td>
                                </tr>

                                <!-- Category 3 -->
                                <tr
                                    style="background: #f8fafc; font-weight: 700; color: #475569; border-bottom: 1px solid #e2e8f0;">
                                    <td colspan="4" style="padding: 8px 16px; font-size: 12px; letter-spacing: 0.05em;">
                                        ADVANCED FEATURES</td>
                                </tr>
                                <tr style="border-bottom: 1px solid #e2e8f0;">
                                    <td
                                        style="padding: 12px 16px; color: #475569; font-weight: 500; border-right: 1px solid #e2e8f0;">
                                        Monthly topic discussion</td>
                                    <td
                                        style="padding: 12px 16px; text-align: center; color: #94a3b8; border-right: 1px solid #e2e8f0;">
                                        -</td>
                                    <td
                                        style="padding: 12px 16px; text-align: center; color: #94a3b8; border-right: 1px solid #e2e8f0;">
                                        -</td>
                                    <td
                                        style="padding: 12px 16px; text-align: center; color: #10b981; font-weight: bold; font-size: 18px;">
                                        ✓</td>
                                </tr>
                                <tr style="border-bottom: 1px solid #e2e8f0;">
                                    <td
                                        style="padding: 12px 16px; color: #475569; font-weight: 500; border-right: 1px solid #e2e8f0;">
                                        District analytics data</td>
                                    <td
                                        style="padding: 12px 16px; text-align: center; color: #94a3b8; border-right: 1px solid #e2e8f0;">
                                        -</td>
                                    <td
                                        style="padding: 12px 16px; text-align: center; color: #94a3b8; border-right: 1px solid #e2e8f0;">
                                        -</td>
                                    <td
                                        style="padding: 12px 16px; text-align: center; color: #10b981; font-weight: bold; font-size: 18px;">
                                        ✓</td>
                                </tr>
                                <tr style="border-bottom: 1px solid #e2e8f0;">
                                    <td
                                        style="padding: 12px 16px; color: #475569; font-weight: 500; border-right: 1px solid #e2e8f0;">
                                        Boost posts - collaboration</td>
                                    <td
                                        style="padding: 12px 16px; text-align: center; color: #94a3b8; border-right: 1px solid #e2e8f0;">
                                        -</td>
                                    <td
                                        style="padding: 12px 16px; text-align: center; color: #94a3b8; border-right: 1px solid #e2e8f0;">
                                        -</td>
                                    <td
                                        style="padding: 12px 16px; text-align: center; color: #10b981; font-weight: bold; font-size: 18px;">
                                        ✓</td>
                                </tr>
                                <tr style="border-bottom: 1px solid #e2e8f0;">
                                    <td
                                        style="padding: 12px 16px; color: #475569; font-weight: 500; border-right: 1px solid #e2e8f0;">
                                        Subscriber meet / research / focus group / product testing</td>
                                    <td
                                        style="padding: 12px 16px; text-align: center; color: #94a3b8; border-right: 1px solid #e2e8f0;">
                                        -</td>
                                    <td
                                        style="padding: 12px 16px; text-align: center; color: #94a3b8; border-right: 1px solid #e2e8f0;">
                                        -</td>
                                    <td
                                        style="padding: 12px 16px; text-align: center; color: #10b981; font-weight: bold; font-size: 18px;">
                                        ✓</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div
                        style="margin-top: 20px; padding-top: 15px; border-top: 1px solid #f1f5f9; font-size: 12px; color: #64748b; line-height: 1.5;">
                        <p style="margin: 0 0 8px 0; display: flex; align-items: start; gap: 6px;">
                            <span style="font-weight: bold; color: #334155;">•</span>
                            <span>This is merely an estimated budget for a 1-month subscription. Enroll to convert the
                                estimate to a Prarang pricing offer.</span>
                        </p>
                        <p style="margin: 0; display: flex; align-items: start; gap: 6px;">
                            <span style="font-weight: bold; color: #334155;">•</span>
                            <span>Applicable taxes (e.g., GST) will be added to the pricing offer.</span>
                        </p>
                    </div>
                </div>
                <!-- Footer -->
                <div
                    style="padding: 16px 24px; border-top: 1px solid #e5e7eb; background: #f8fafc; display: flex; justify-content: flex-end;">
                    <button type="button" wire:click="$set('showPlansModal', false)" class="btn btn-secondary btn-sm"
                        style="padding: 8px 20px; font-weight: 600;">Close</button>
                </div>
            </div>
        </div>
        @endif
        @if($shareUrl)
        <div class="modal fade show" tabindex="-1"
            style="z-index: 99999; display: block; background: rgba(0,0,0,0.5); backdrop-filter: blur(4px);">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content bg-transparent border-0">
                    <div class="bg-white p-8 rounded-2xl shadow-2xl flex flex-col items-center max-w-md w-full mx-auto"
                        x-data="{ copied: false }" @click.away="$wire.set('shareUrl', null)">
                        <div
                            class="w-16 h-16 bg-blue-50 text-blue-600 rounded-full flex items-center justify-center mb-4">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Share your Plan</h3>
                        <p class="text-gray-500 text-center text-sm mb-6">Copy the link below to share this planner
                            configuration
                            with others.</p>

                        <div
                            class="w-full flex items-center gap-2 bg-gray-50 p-3 rounded-xl border border-gray-200 mb-6">
                            <input type="text" readonly value="{{ $shareUrl }}" x-ref="shareInput"
                                class="bg-transparent border-none focus:ring-0 text-sm flex-1 text-gray-600 font-medium">
                            <button @click="
                                $refs.shareInput.select();
                                document.execCommand('copy');
                                copied = true;
                                setTimeout(() => copied = false, 2000);
                            " :class="copied ? 'bg-green-600' : 'bg-blue-600'"
                                class="text-white px-4 py-2 rounded-lg text-sm font-bold transition-all active:scale-95 min-w-[80px]">
                                <span x-show="!copied">Copy</span>
                                <span x-show="copied" x-cloak>Copied!</span>
                            </button>
                        </div>
                        @php
                        $shareTitle = urlencode('India Knowledge Webs for Partnerships');
                        @endphp

                        <div class="mt-6 flex items-center justify-center gap-3">

                            <!-- WhatsApp -->
                            <a href="https://wa.me/?text={{ $shareTitle }}%20{{ urlencode($shareUrl) }}"
                                target="_blank"
                                class="flex h-11 w-11 items-center justify-center rounded-full bg-green-100 text-green-600 shadow-sm transition-all duration-200 hover:-translate-y-1 hover:bg-green-600 hover:text-white">
                                <i class="bi bi-whatsapp text-xl"></i>
                            </a>

                            <!-- Facebook -->
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($shareUrl) }}"
                                target="_blank"
                                class="flex h-11 w-11 items-center justify-center rounded-full bg-blue-100 text-blue-600 shadow-sm transition-all duration-200 hover:-translate-y-1 hover:bg-blue-600 hover:text-white">
                                <i class="bi bi-facebook text-xl"></i>
                            </a>

                            <!-- X -->
                            <a href="https://twitter.com/intent/tweet?text={{ $shareTitle }}&url={{ urlencode($shareUrl) }}"
                                target="_blank"
                                class="flex h-11 w-11 items-center justify-center rounded-full bg-gray-100 text-gray-800 shadow-sm transition-all duration-200 hover:-translate-y-1 hover:bg-black hover:text-white">
                                <i class="bi bi-twitter-x text-xl"></i>
                            </a>

                            <!-- LinkedIn -->
                            <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode($shareUrl) }}"
                                target="_blank"
                                class="flex h-11 w-11 items-center justify-center rounded-full bg-blue-100 text-black shadow-sm transition-all duration-200 hover:-translate-y-1 hover:bg-sky-700 hover:text-white">
                                <i class="bi bi-linkedin text-xl"></i>
                            </a>



                        </div>

                        <button wire:click="$set('shareUrl', null)"
                            class="text-gray-400 hover:text-gray-600 mt-2 text-sm font-medium transition-colors">
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <style>
            [x-cloak] {
                display: none !important;
            }

            /* Scroll containers — 3x wider min-width */
            .overflow-y-auto.max-h-\[80vh\] {
                min-width: 0;
            }

            /* Custom scrollbar — 15px wide */
            .custom-scrollbar::-webkit-scrollbar {
                width: 18px;
                height: 15px;
            }

            .custom-scrollbar::-webkit-scrollbar-track {
                background: #f3f4f6;
                border-radius: 10px;
            }

            .custom-scrollbar::-webkit-scrollbar-thumb {
                background: #9ca3af;
                border-radius: 10px;
                border: 3px solid #f3f4f6;
            }

            .custom-scrollbar::-webkit-scrollbar-thumb:hover {
                background: #6b7280;
            }

            .custom-scrollbar::-webkit-scrollbar-corner {
                background: #f3f4f6;
            }
        </style>

</x-partners.city-village-frame>
