<!DOCTYPE html>
<html lang="hi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>@yield('meta_title', 'Yellow Pages - Find Businesses & Services')</title>

    <meta name="description" content="@yield('meta_description', 'Discover local businesses, services, and more.')">
    <meta name="keywords" content="@yield('meta_keywords', 'yellow pages, local directory, businesses')">

    <!-- Open Graph Meta Tags for SEO & Social Sharing -->
    <meta property="og:locale" content="en_IN">
    <meta name="robots" content="index, follow">
    <meta property="og:type" content="article">
    <meta property="og:image:width" content="600">
    <meta property="og:image:height" content="315">
    <meta property="og:site_name" content="Yellow Pages">

    <meta property="og:title" content="@yield('meta_og_title', 'Yellow Pages - Business Directory')">
    <meta property="og:description" content="@yield('meta_og_description', 'Find the best businesses and services near you.')">
    <meta property="og:image" content="@yield('meta_og_image', asset('assets/images/yp_logo_img.jpg'))">
    <meta property="og:url" content="{{ url()->current() }}">

      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">

</head>
<body>
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1592 830" preserveAspectRatio="xMidYMid" width="1592" height="830" xmlns:xlink="http://www.w3.org/1999/xlink" style="shape-rendering:auto;display:block;background-position-x:0%;background-position-y:0%;background-size:auto;background-origin:padding-box;background-clip:border-box;background:scroll rgba(0, 0, 0, 0) none  repeat;width:1592px;height:830px;;animation:none"><g><g opacity="0.4" transform="matrix(100,0,0,100,1758.1326904296875,34.06471252441406)" style="transform:matrix(100, 0, 0, 100, 1758.13, 34.0647);opacity:0.4;;animation:none"><path stroke-width="0" fill="#fedd59" d="M8.795799999999998 0 C8.795799999999998 2.0695999999999994 11.340675510115574 4.157773824327724 10.305875510115575 5.950099999999998 S6.190226175672274 6.582586246607163 4.3979 7.617386246607163 S2.0696000000000003 11.900199999999998 7.286770919606665e-16 11.900199999999998 S-2.605573824327723 8.652186246607164 -4.397899999999997 7.617386246607165 S-9.271075510115573 7.742426175672276 -10.305875510115573 5.950100000000003 S-8.795799999999998 2.0696000000000003 -8.795799999999998 1.0771748315940288e-15 S-11.340675510115576 -4.157773824327721 -10.305875510115577 -5.9500999999999955 S-6.190226175672276 -6.5825862466071605 -4.397900000000003 -7.617386246607161 S-2.0696000000000017 -11.900199999999998 -2.1860312758819993e-15 -11.900199999999998 S2.6055738243277182 -8.652186246607165 4.397899999999993 -7.617386246607167 S9.27107551011557 -7.742426175672278 10.305875510115571 -5.950100000000004 S8.795799999999998 -2.0696000000000017 8.795799999999998 -2.1543496631880575e-15" transform="matrix(1,0,0,1,0,0)" style="fill:#FEDD59;transform:matrix(1, 0, 0, 1, 0, 0);;animation:none"></path></g>
    <g opacity="0.4" transform="matrix(100,0,0,100,1950.5592041015625,-42.122344970703125)" style="transform:matrix(100, 0, 0, 100, 1950.56, -42.1223);opacity:0.4;;animation:none"><path stroke-width="0" fill="#eecd49" d="M10.55496 0 C10.55496 2.4835199999999995 13.608810612138692 4.98932858919327 12.367050612138693 7.140119999999999 S7.42827141080673 7.899103495928597 5.277480000000001 9.140863495928597 S2.4835200000000004 14.28024 8.744125103527999e-16 14.28024 S-3.126688589193268 10.382623495928598 -5.277479999999997 9.140863495928599 S-11.125290612138688 9.290911410806732 -12.367050612138689 7.140120000000004 S-10.55496 2.483520000000001 -10.55496 1.2926097979128347e-15 S-13.608810612138694 -4.989328589193267 -12.367050612138694 -7.140119999999996 S-7.428271410806732 -7.899103495928594 -5.277480000000004 -9.140863495928595 S-2.483520000000002 -14.28024 -2.6232375310583993e-15 -14.28024 S3.126688589193263 -10.3826234959286 5.277479999999993 -9.140863495928603 S11.125290612138686 -9.290911410806734 12.367050612138687 -7.140120000000006 S10.55496 -2.483520000000002 10.55496 -2.5852195958256695e-15" transform="matrix(1,0,0,1,0,0)" style="fill:#FEDD59;transform:matrix(1, 0, 0, 1, 0, 0);;animation:none"></path></g>
    <g opacity="0.4" transform="matrix(100,0,0,100,2412.383056640625,-224.97128295898438)" style="transform:matrix(100, 0, 0, 100, 2412.38, -224.971);opacity:0.4;;animation:none"><path stroke-width="0" fill="#debd39" d="M14.776944 0 C14.776944 3.4769279999999996 19.052334856994168 6.9850600248705765 17.313870856994168 9.996167999999997 S10.399579975129422 11.058744894300037 7.388472000000002 12.797208894300038 S3.476928000000001 19.992335999999998 1.2241775144939199e-15 19.992335999999998 S-4.377364024870576 14.535672894300038 -7.388471999999997 12.79720889430004 S-15.575406856994164 13.007275975129426 -17.313870856994164 9.996168000000006 S-14.776944 3.4769280000000014 -14.776944 1.8096537170779687e-15 S-19.05233485699417 -6.985060024870573 -17.31387085699417 -9.996167999999994 S-10.399579975129425 -11.058744894300034 -7.388472000000006 -12.797208894300034 S-3.476928000000003 -19.992335999999998 -3.672532543481759e-15 -19.992335999999998 S4.377364024870569 -14.53567289430004 7.38847199999999 -12.797208894300043 S15.57540685699416 -13.007275975129428 17.31387085699416 -9.996168000000008 S14.776944 -3.476928000000003 14.776944 -3.6193074341559375e-15" transform="matrix(1,0,0,1,0,0)" style="fill:#FEDD59;transform:matrix(1, 0, 0, 1, 0, 0);;animation:none"></path></g>
    <g></g></g><!-- [ldio] generated by https://loading.io --></svg>


    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
