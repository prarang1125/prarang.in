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

<!-- Navigation -->
<ul class="metismenu" id="menu">
    @if(Auth::check() && Auth::user()->subscriptions->isNotEmpty()) 
        <h6>सदस्यता</h6>
        <li>
            <a href="{{ url('yellow-pages/user/dashboard') }}">
                <div class="parent-icon"><i class="bx bx-home-circle"></i></div>
                <div class="menu-title">डैशबोर्ड</div>
            </a>
        </li>

        <!-- vCard Management (only for vCard or both plan users) -->
        @foreach(Auth::user()->subscriptions as $subscription)
            @if($subscription->plan && ($subscription->plan->type == 'वीकार्ड' || $subscription->plan->type == 'दोनों'))
                <li>
                    <a href="{{ url('yellow-pages/user/createCard') }}">
                        <div class="parent-icon"><i class="lni lni-user"></i></div>
                        <div class="menu-title">वीकार्ड</div>
                    </a>
                </li>
                <li>
                    <a href="{{ url('yellow-pages/user/vcard-list') }}">
                        <div class="parent-icon"><i class="lni lni-user"></i></div>
                        <div class="menu-title">वीकार्ड सूची</div>
                    </a>
                </li>
            @endif
        @endforeach

        <!-- Subscription Plans -->
        <li>
            <a href="{{ url('yellow-pages/user/ActivePlan') }}">
                <div class="parent-icon"><i class="bx bx-category"></i></div>
                <div class="menu-title">सदस्यता</div>
            </a>
        </li>

        <!-- Membership Plan (Available for all) -->
        <li>
            <a href="{{ url('yellow-pages/user/MembershipPlan') }}">
                <div class="parent-icon"><i class="bx bx-category"></i></div>
                <div class="menu-title">सदस्यता योजना</div>
            </a>
        </li>
    @endif

    <!-- Account Section -->
    @if(Auth::check() && Auth::user()->subscriptions->isNotEmpty())
        <h6>खाता</h6>
        <li>
            <a href="{{ url('yellow-pages/user/paymentHistory') }}">
                <div class="parent-icon"><i class="bx bx-wallet"></i></div>
                <div class="menu-title">लेन-देन</div>
            </a>
        </li>
    @endif

    <!-- Business Section (only for YellowPages or Both plans) -->
    @foreach(Auth::user()->subscriptions as $subscription)
        @if($subscription->plan && ($subscription->plan->type == 'येलोपेज' || $subscription->plan->type == 'दोनों'))
            <h6>व्यापार</h6>
            <!-- Business Listing and Related Sections -->
            <li>
                <a href="{{ url('yellow-pages/user/business-listing') }}">
                    <div class="parent-icon"><i class="bx bx-store"></i></div>
                    <div class="menu-title">व्यवसाय सूचीकरण</div>
                </a>
            </li>
            <li>
                <a href="{{ url('yellow-pages/user/save-listing') }}">
                    <div class="parent-icon"><i class="bx bx-save"></i></div>
                    <div class="menu-title">सहेजें व्यवसाय</div>
                </a>
            </li>
            <li>
                <a href="{{ url('yellow-pages/user/rating') }}">
                    <div class="parent-icon"><i class="bx bx-star"></i></div>
                    <div class="menu-title">समीक्षा</div>
                </a>
            </li>
        @endif
    @endforeach

    <!-- Message Section (Available for all users) -->
    @if(Auth::check() && Auth::user()->subscriptions->isNotEmpty())
        <li>
            <a href="{{ url('yellow-pages/user/report') }}">
                <div class="parent-icon"><i class="bx bx-chart"></i></div>
                <div class="menu-title">संदेश</div>
            </a>
        </li>
        <li>
            <a href="{{ url('yellow-pages/user/list') }}">
                <div class="parent-icon"><i class="bx bx-chart"></i></div>
                <div class="menu-title">संदेश सूचीकरण</div>
            </a>
        </li>
    @endif
</ul>
