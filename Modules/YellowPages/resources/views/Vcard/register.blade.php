@extends('yellowpages::layout.auth')

@section('title', __('yp.create_website_in_city'))
@section('meta_og_title', __('yp.create_website_in_city'))

@php
$descriptions = [
'rampur' => 'रामपुर का पहला हिंदी येलोपेज़! यहां अपना वेबपेज बनाएं और अपना बिज़नेस कार्ड प्रिंट करें!',
'lucknow' => 'लखनऊ का पहला हिंदी येलोपेज़! यहां अपना वेबपेज बनाएं और अपना बिज़नेस कार्ड प्रिंट करें!',
'meerut' => 'मेरठ का पहला हिंदी येलोपेज़! यहां अपना वेबपेज बनाएं और अपना बिज़नेस कार्ड प्रिंट करें!',
];

$defaultDescription = __('yp.automatic_website_maker');
$metaDescription = $descriptions[$slug] ?? $defaultDescription;

$images = [
'rampur' => 'https://i.ibb.co/GvFF9H1k/Add-a-heading.png',
'meerut' => 'https://i.postimg.cc/j5FWqX4F/Thumbnail-6.png',
'lucknow' => 'https://i.ibb.co/PzYgXpZQ/lucknowog.png',
];

$defaultImage = asset('assets/images/ad-web-p.png');
$metaImage = $images[$slug] ?? $defaultImage;
@endphp

@section('meta_og_description', __('yp.automatic_website_maker'))
@section('meta_og_image', $metaImage)



@section('content')
<style>
  /* Import Google Fonts */
  @import url("//fonts.googleapis.com/css2?family=TimesNewRoman:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap");

  /* Heading */
  .card .sign-in-form h2 {
    font-weight: 700;
    font-family: 'TimesNewRoman', 'Times New Roman', Times, Baskerville, Georgia, serif;
    font-size: 28px;
  }

  /* Division */
  .card .sign-in-form .mb-3 {
    margin-bottom: 15px !important;
  }

  #name {
    margin-top: -5px;
  }

  /* Link */
  .d-flex .card a {
    color: #020202;
    font-weight: 700;
    text-decoration: none;
    text-align: center;
    padding-top: 6px;
  }

  /* Link (hover) */
  .d-flex .card a:hover {
    color: #f39c12;
  }

  /* Phone */
  #phone {
    margin-top: -5px;
  }

  /* City */
  #city {
    margin-top: -3px;
  }

  /* Form Division */
  .d-flex .card form {
    transform: translatex(0px) translatey(0px);
  }

  /* Name */
  #name {
    padding-bottom: 0px;
    margin-top: -6px !important;
  }

  /* Division */
  .row .col-sm-6 div .d-flex .card .sign-in-form .mb-3 {
    margin-bottom: 7px !important;
  }

  /* Name */
  #name {
    padding-bottom: 6px !important;
  }

  /* Heading */
  .card .sign-in-form h2 {
    color: #020202 !important;
  }

  .logo-sec {
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
  }

  *,
  :after,
  :before {
    box-sizing: border-box;
  }

  img {
    vertical-align: middle;
  }

  p {
    margin-top: 0;
    margin-bottom: 1rem;
  }

  .pie {
    border-left: 4px solid;
    height: 50px;
  }

  .panel p {
    font-size: 0.95rem;
    padding: 0.7rem 0;
  }


  /* These were inline style tags. Uses id+class to override almost everything */
  #style-Kl3pw.style-Kl3pw {
    width: 100px;
    height: auto;
  }

  #style-kRBjZ.style-kRBjZ {
    width: 30%;
    height: auto;
  }

  /* Ldiv */
  .row .ldiv {
    width: 750px;
    min-height: 16px !important;
    height: 56vh;
  }

  /* Col 6 */
  .row .col-sm-6 {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    transform: translatex(0px) translatey(0px);
  }

  /* Image */
  .row .col-sm-6>div>img {
    width: 60% !important;
    display: inline-block;
    transform: translatex(0px) translatey(0px) !important;
  }

  /* Ldiv */
  .row .ldiv {
    height: 51px !important;
  }

  /* Division */
  .row .col-sm-6>div {
    display: flex;
    justify-content: center;
  }


  @media (max-width:576px) {

    /* Logo sec */
    .row .ldiv .logo-sec {
      justify-content: center;
      padding-top: 65px;
    }

    /* Logo sec */
    .row .col-sm-6 .ldiv .logo-sec {
      width: 100% !important;
    }

    /* Ldiv */
    .row .col-sm-6 .ldiv {
      width: 100% !important;
    }

    /* Image */
    .row .col-sm-6>div>img {
      display: none !important;
    }

    /* Flex */
    .row .col-sm-6 div .d-flex {
      min-height: 625px !important;
      height: 625px;
    }

  }

  /* Body */
  body {
      {
        {
        -- background-image: url("file:///C:/Users/vivek/Downloads/Fluid@1x-100.0s-1592px-830px%20(1).svg");
        --
      }
    }

    background-size:cover;
    background-attachment:fixed;
    background-repeat:repeat-x;
    background-position-y:0%;
    background-position-x:100%;
  }

  /* Svg */
  svg {
    position: fixed;
    transform: rotateY(180deg) rotateZ(9deg);
  }

  /* Svg */
  svg {
    top: -171px;
    transform: rotateZ(-180deg) !important;
    height: 975px !important;
    width: 1373px !important;
  }

  @media (max-width:576px) {

    /* Svg */
    svg {
      width: 898px !important;
      height: 497px !important;
      transform: rotateX(35deg) rotateY(-5deg) rotateZ(180deg) !important;
    }

  }

  /* Button */
  .card .sign-in-form .btn-primary {
    margin-top: 7px;
  }

  /* Division */
  .card .sign-in-form .mb-3 {
      {
        {
        -- transform: translatex(0px) translatey(0px);
        --
      }
    }
  }

  /* Password */
  #password {
    margin-top: -6px;
  }


  /* Hero */
  .row .hero-txt {
    display: flex;
    margin-top: 24px;
    align-self: center;
    flex-direction: column;
    align-items: center;
  }

  /* Paragraph */
  .row .hero-txt p {
    font-weight: 700;
  }


  /* Subtxth */
  .row .hero-txt .subtxth {
    margin-bottom: 5px;
    margin-top: -13px;
    font-weight: 500;
  }

  /* Paragraph */
  .row .hero-txt p {
    font-size: 17px;
    line-height: 1.5em;
  }

  /* Hero */
  .row .hero-txt {
    margin-top: 32px !important;
  }

  /* Image */
  .ldiv .logo-sec img {
    padding-bottom: 9px;
  }

  /* Style */
  #style-kRBjZ {
    padding-top: 4px;
  }

  /* Paragraph */
  .ldiv .logo-sec p {
    min-height: 75px;
  }

  @media (max-width:576px) {

    /* Hero */
    .row .hero-txt {
      margin-top: 57px !important;
      padding-top: 9px;

        {
          {
          -- transform: translatex(0px) translatey(0px);
          --
        }
      }

      padding-left:30px;
      padding-right:45px;
    }

    /* Subtxth */
    .row .hero-txt .subtxth {
      display: block;
      white-space: pre-wrap;
      text-align: center;
    }

    /* Flex */
    .row .col-sm-6 div .d-flex {
        {
          {
          -- transform: translatex(0px) translatey(-59px);
          --
        }
      }
    }

    /* Logo sec */
    .row .ldiv .logo-sec {
      padding-top: 78px !important;
    }

  }

  @keyframes confetti-fall {
    0% {
      transform: translate(0, 0) rotate(0deg);
      opacity: 1;
    }

    100% {
      transform: translate(calc(200px * var(--dirX)), calc(-250px * var(--dirY))) rotate(720deg);
      opacity: 0;
    }
  }



  .modal {
    display: none;
    position: fixed;
    top: 5vh;
    left: 50%;
    transform: translateX(-50%);
    background: rgba(77, 77, 77, 0.7);
    border-radius: 10px;
    width: 500px;
    text-align: center;
    z-index: 1000;
  }

  .modal.show {
    display: block;
  }

  .modal__content {
    background: #fff;
    padding: 30px;
    text-align: center;
    border-radius: 10px;
    position: relative;
    overflow: hidden;
  }

  .modal__content h1 {
    color: #4CAF50;
    font-size: 24px;
  }

  .modal__close {
    position: absolute;
    top: 10px;
    right: 10px;
    font-size: 24px;
    color: #333;
    cursor: pointer;
  }

  .confetti {
    position: absolute;
    animation: confetti-fall 2.5s linear forwards;
  }

  .confetti.circle {
    width: 10px;
    height: 10px;
    border-radius: 50%;
  }

  .confetti.square {
    width: 10px;
    height: 10px;
  }

  .confetti.ribbon {
    width: 16px;
    height: 5px;
    border-radius: 2px;
  }

  /* Card */
  .row div .card {
    box-shadow: 0px 16px 48px 26px rgba(0, 0, 0, 0.176) !important;
    transform: translatex(0px) translatey(0px);
  }

  /* Heading */
  .card section h1 {
    text-align: center;
    font-weight: 700;
    font-size: 38px;
    color: #0d951f;
    margin-bottom: 22px;
  }

  /* Paragraph */
  .card section p {
    font-weight: 600;
  }

  /* Paragraph */
  .card section p {
    text-align: center;
    margin-bottom: 22px;
  }

  /* Heading */
  .card section h1 {
    margin-bottom: 0px !important;
  }

  g {
    animation: floatAnimation 4s infinite ease-in-out alternate;
  }

  @keyframes floatAnimation {
    0% {
      transform: translateY(0);
      opacity: 0.6;
    }

    100% {
      transform: translateY(-20px);
      opacity: 1;
    }
  }

  path {
    animation: pulseAnimation 2s infinite ease-in-out alternate;
  }

  @keyframes pulseAnimation {
    0% {
      transform: scale(1);
      opacity: 0.8;
    }

    100% {
      transform: scale(1.1);
      opacity: 1;
    }
  }
</style>


<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1592 830" preserveAspectRatio="xMidYMid" width="1592" height="830"
  xmlns:xlink="http://www.w3.org/1999/xlink"
  style="shape-rendering:auto;display:block;background-position-x:0%;background-position-y:0%;background-size:auto;background-origin:padding-box;background-clip:border-box;background:scroll rgba(0, 0, 0, 0) none  repeat;width:1592px;height:830px;;animation:none">
  <g>
    <g opacity="0.4" transform="matrix(100,0,0,100,1758.1326904296875,34.06471252441406)"
      style="transform:matrix(100, 0, 0, 100, 1758.13, 34.0647);opacity:0.4;;animation:none">
      <path stroke-width="0" fill="#fedd59"
        d="M8.795799999999998 0 C8.795799999999998 2.0695999999999994 11.340675510115574 4.157773824327724 10.305875510115575 5.950099999999998 S6.190226175672274 6.582586246607163 4.3979 7.617386246607163 S2.0696000000000003 11.900199999999998 7.286770919606665e-16 11.900199999999998 S-2.605573824327723 8.652186246607164 -4.397899999999997 7.617386246607165 S-9.271075510115573 7.742426175672276 -10.305875510115573 5.950100000000003 S-8.795799999999998 2.0696000000000003 -8.795799999999998 1.0771748315940288e-15 S-11.340675510115576 -4.157773824327721 -10.305875510115577 -5.9500999999999955 S-6.190226175672276 -6.5825862466071605 -4.397900000000003 -7.617386246607161 S-2.0696000000000017 -11.900199999999998 -2.1860312758819993e-15 -11.900199999999998 S2.6055738243277182 -8.652186246607165 4.397899999999993 -7.617386246607167 S9.27107551011557 -7.742426175672278 10.305875510115571 -5.950100000000004 S8.795799999999998 -2.0696000000000017 8.795799999999998 -2.1543496631880575e-15"
        transform="matrix(1,0,0,1,0,0)" style="fill:#FEDD59;transform:matrix(1, 0, 0, 1, 0, 0);;animation:none"></path>
    </g>
    <g opacity="0.4" transform="matrix(100,0,0,100,1950.5592041015625,-42.122344970703125)"
      style="transform:matrix(100, 0, 0, 100, 1950.56, -42.1223);opacity:0.4;;animation:none">
      <path stroke-width="0" fill="#eecd49"
        d="M10.55496 0 C10.55496 2.4835199999999995 13.608810612138692 4.98932858919327 12.367050612138693 7.140119999999999 S7.42827141080673 7.899103495928597 5.277480000000001 9.140863495928597 S2.4835200000000004 14.28024 8.744125103527999e-16 14.28024 S-3.126688589193268 10.382623495928598 -5.277479999999997 9.140863495928599 S-11.125290612138688 9.290911410806732 -12.367050612138689 7.140120000000004 S-10.55496 2.483520000000001 -10.55496 1.2926097979128347e-15 S-13.608810612138694 -4.989328589193267 -12.367050612138694 -7.140119999999996 S-7.428271410806732 -7.899103495928594 -5.277480000000004 -9.140863495928595 S-2.483520000000002 -14.28024 -2.6232375310583993e-15 -14.28024 S3.126688589193263 -10.3826234959286 5.277479999999993 -9.140863495928603 S11.125290612138686 -9.290911410806734 12.367050612138687 -7.140120000000006 S10.55496 -2.483520000000002 10.55496 -2.5852195958256695e-15"
        transform="matrix(1,0,0,1,0,0)" style="fill:#FEDD59;transform:matrix(1, 0, 0, 1, 0, 0);;animation:none"></path>
    </g>
    <g opacity="0.4" transform="matrix(100,0,0,100,2412.383056640625,-224.97128295898438)"
      style="transform:matrix(100, 0, 0, 100, 2412.38, -224.971);opacity:0.4;;animation:none">
      <path stroke-width="0" fill="#debd39"
        d="M14.776944 0 C14.776944 3.4769279999999996 19.052334856994168 6.9850600248705765 17.313870856994168 9.996167999999997 S10.399579975129422 11.058744894300037 7.388472000000002 12.797208894300038 S3.476928000000001 19.992335999999998 1.2241775144939199e-15 19.992335999999998 S-4.377364024870576 14.535672894300038 -7.388471999999997 12.79720889430004 S-15.575406856994164 13.007275975129426 -17.313870856994164 9.996168000000006 S-14.776944 3.4769280000000014 -14.776944 1.8096537170779687e-15 S-19.05233485699417 -6.985060024870573 -17.31387085699417 -9.996167999999994 S-10.399579975129425 -11.058744894300034 -7.388472000000006 -12.797208894300034 S-3.476928000000003 -19.992335999999998 -3.672532543481759e-15 -19.992335999999998 S4.377364024870569 -14.53567289430004 7.38847199999999 -12.797208894300043 S15.57540685699416 -13.007275975129428 17.31387085699416 -9.996168000000008 S14.776944 -3.476928000000003 14.776944 -3.6193074341559375e-15"
        transform="matrix(1,0,0,1,0,0)" style="fill:#FEDD59;transform:matrix(1, 0, 0, 1, 0, 0);;animation:none"></path>
    </g>
    <g></g>
  </g><!-- [ldio] generated by https://loading.io -->
</svg>

<div class="row">
  <div class="col-sm-6">
    <div class="ldiv container d-flex justify-content-center align-items-center min-vh-100">
      <div class="logo-sec snipcss-LUbH5">
        <img src="{{ asset('assets/images/yplogo.png') }}" alt="logo icon" id="style-Kl3pw" class="style-Kl3pw">
        <p class="pie"></p>
        <img src="{{ asset('assets/images/logo-bg.png') }}" alt="logo icon" id="style-kRBjZ" class="style-kRBjZ">
      </div>

    </div>
    <div class="hero-txt">

      <p>{{ __('yp.india_first_yellowpage') }}</p>
      <p class="subtxth">{{ __('yp.get_business_online') }}</p>
    </div>
    <div>
      <img src="{{ asset('assets/images/Mobile-login-rafiki.png') }}" alt="">
    </div>

  </div>
  <div class="col-sm-6">
    @livewire('yellow-pages.elements.new-accounts', ['slug' => $slug])</div>

</div>



@endsection