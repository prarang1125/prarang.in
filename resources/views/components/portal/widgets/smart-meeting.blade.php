<section>
    <style>
        /* Widget  inner */
#sidebar-right .widget .widget__inner{
 padding-top:5px;
 padding-bottom:5px;
 padding-left:17px;
}

/* List */
#sidebar-right .widget ul{
 margin-bottom:5px;
}
/* Widget */
#sidebar-right section .fbpage{
 margin-top:-18px !important;
}



    </style>

@empty($presentation)
@else

<div class="widget lsvr_notice-list-widget fbpage2 mt-0" id="lsvr_notices_notice_list-2">
    <div class="widget__inner">
        <h3 class="widget__title widget__title--has-icon ps-2">
            {{-- <i class="fa fa-news"></i> --}}
            {{ $locale['ui']['smart_citizens'] ?? 'Smart Citizens' }} {{ $portal->city_name }} {{ $locale['ui']['interaction'] ?? 'Interaction' }}
        </h3>
        <div class="widget__content">

            <ul>
                <li><b><a class="smart-p-link" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#smartMeetingP">{{ $presentation['date'] }} {{ $locale['ui']['meeting'] ?? 'Meeting' }}</a></b></li>
                <li><b><a class="smart-p-link" target="_blank"
                            href="{{ env('B2B_URL') }}/semiotic/{{ base64_encode($portal->city_code) }}">{{ $portal->city_name }}
                            {{ $locale['ui']['semiotics'] ?? 'Semiotics' }}</a></b></li>
            </ul>
        </div>
    </div>
    <div class="modal fade" id="smartMeetingP" tabindex="-1" aria-labelledby="smartMeetingPLabel"
        data-bs-backdrop="false" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-body">
                    <h4><?php echo $presentation['title']; ?> <?php echo $presentation['date']; ?></h4>
                    <a class="h3" target="_blank" href="<?php echo $presentation['pdf_path']; ?>">⦿ Presentation
                        <small>(.pdf)</small></a>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ $locale['ui']['close'] ?? 'Close' }}</button>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="widget lsvr_notice-list-widget fbpage mt-0" id="lsvr_notices_notice_list-2">
    <div class="widget__inner">
        <h3 class="widget__title widget__title--has-icon ps-2">
            {{-- <i class="fa fa-news"></i> --}}
            {{ $locale['ui']['join_prarang'] ?? 'Join Prarang' }} {{ $portal->city_name }} {{ $locale['ui']['free_subscription'] ?? 'Free Subscription' }}
        </h3>
        <div class="widget__content text-center">


            <a class="btn btn-primary" target="_blank" href="https://www.facebook.com/prarang.in"
                contenteditable="false" style="cursor: pointer;">
                <i class="fa fa-facebook-f"></i> {{ $locale['ui']['facebook_page'] ?? 'Facebook Page' }}
            </a>
            <a class="btn btn-success" target="_blank"
                href="https://play.google.com/store/apps/details?id=com.riversansskriti.prarang" contenteditable="false"
                style="cursor: pointer;">
                <i class="fa fa-mobile"></i> {{ $locale['ui']['mobile_app'] ?? 'Mobile App' }}
            </a>
        </div>
    </div>
</div>
</section>
@endif
