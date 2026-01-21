<div class="sidebar-header">
    <div>
        <img src="{{ asset('assets/images/logo.png') }}" class="logo-icon" alt="logo icon">
    </div>
    <div>
        <h4 class="logo-text">प्रारंग</h4>
    </div>
    <div class="toggle-icon ms-auto">
        <i class="bx bx-menu"></i>
    </div>
</div>

<button class="close-sidebar">✖</button>
<!-- Navigation -->
<ul class="metismenu" id="menu">

    {{-- @if (Auth::check() && Auth::user()->subscriptions->isNotEmpty()) --}}
    @if (session('has_vcard'))
        <h6>{{ __('yp.membership') }}</h6>
        <li>
            <a href="{{ route('vCard.dashboard') }}">
                <div class="parent-icon"><i class="bx bx-home-circle"></i></div>
                <div class="menu-title">{{ __('yp.dashboard') }}</div>
            </a>
        </li>

        <!-- vCard Management (only for vCard or both plan users) -->
        {{-- @foreach (Auth::user()->subscriptions as $subscription) --}}
        {{-- @if ($subscription->plan && ($subscription->plan->type == 'वीकार्ड' || $subscription->plan->type == 'दोनों'))
    --}}
        {{-- <li>
        <a href="{{ route('vCard.createCard') }}">
            <div class="parent-icon"><i class="lni lni-user"></i></div>
            <div class="menu-title">वीकार्ड</div>
        </a>
    </li> --}}
        <li>
            <a href="{{ route('vCard.list') }}">
                <div class="parent-icon"><i class="lni lni-user"></i></div>
                <div class="menu-title">{{ __('yp.my_web_page') }}</div>
            </a>
        </li>
        {{-- @endif --}}
        {{-- @endforeach --}}

        <!-- Subscription Plans -->
        {{-- <li>
        <a href="{{ route('vCard.plan') }}">
            <div class="parent-icon"><i class="bx bx-category"></i></div>
            <div class="menu-title">सदस्यता</div>
        </a>
    </li> --}}

        <!-- Membership Plan (Available for all) -->
        {{-- <li>
        <a href="{{ route('vCard.planDetails') }}">
            <div class="parent-icon"><i class="bx bx-category"></i></div>
            <div class="menu-title">सदस्यता योजना</div>
        </a>
    </li> --}}
        {{-- @endif --}}

        <!-- Account Section -->
        {{-- @if (Auth::check() && Auth::user()->subscriptions->isNotEmpty()) --}}
        {{-- <h6>खाता</h6>
    <li>
        <a href="{{ route('vCard.paymentHistory') }}">
            <div class="parent-icon"><i class="bx bx-wallet"></i></div>
            <div class="menu-title">लेन-देन</div>
        </a>
    </li> --}}
        {{-- @endif --}}
        {{-- @if (session('has_business_listing')) --}}


        <!-- Business Section (only for YellowPages or Both plans) -->
        {{-- @foreach (Auth::user()->subscriptions as $subscription)
    @if ($subscription->plan && ($subscription->plan->type == 'येलोपेज' || $subscription->plan->type == 'दोनों')) --}}
        <h6>{{ __('yp.business') }}</h6>
        <!-- Business Listing and Related Sections -->
        <li>
            <a href="{{ route('vCard.business-listing') }}">
                <div class="parent-icon"><i class="bx bx-store"></i></div>
                <div class="menu-title">{{ __('yp.business_listing') }}</div>
            </a>
        </li>
        <li>
            <a href="{{ route('vCard.products.index') }}">
                <div class="parent-icon"><i class="bx bx-shopping-bag"></i></div>
                <div class="menu-title">{{ __('yp.products') }}</div>
            </a>
        </li>
        <li>
            <a href="{{ route('vCard.business-save') }}">
                <div class="parent-icon"><i class="bx bx-save"></i></div>
                <div class="menu-title">{{ __('yp.stored_business') }}</div>
            </a>
        </li>
        <li>
            <a href="{{ route('vCard.Rating') }}">
                <div class="parent-icon"><i class="bx bx-star"></i></div>
                <div class="menu-title">{{ __('yp.reviews') }}</div>
            </a>
        </li>
        {{-- @endif --}}
        {{-- @endif
    @endforeach --}}

        <!-- Message Section (Available for all users) -->
        {{-- @if (Auth::check() && Auth::user()->subscriptions->isNotEmpty()) --}}
        <li>
            <a href="{{ route('vCard.report') }}">
                <div class="parent-icon"><i class="bx bx-chart"></i></div>
                <div class="menu-title">{{ __('yp.messages') }}</div>
            </a>
        </li>
        <li>
            <a href="{{ route('vCard.report-list') }}">
                <div class="parent-icon"><i class="bx bx-chart"></i></div>
                <div class="menu-title">{{ __('yp.message_listing') }}</div>
            </a>
        </li>
    @endif
</ul>
