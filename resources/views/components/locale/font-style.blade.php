@switch(app()->getLocale())
    @case('hi')
        <link href="https://fonts.googleapis.com/css2?family=Tiro+Devanagari+Hindi:ital@0;1&display=swap" rel="stylesheet">
        <style>
            * {
                font-family: 'Tiro Devanagari Hindi', serif !important;
                font-style: normal;
            }
        </style>
    @break

    @case('mr')
        <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@400;600&display=swap" rel="stylesheet">
        <style>
            * {
                font-family: 'Baloo 2', cursive !important;
                font-style: normal;
            }
        </style>
    @break

    @case('ta')
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Tamil:wght@400;700&display=swap" rel="stylesheet">
        <style>
            * {
                font-family: 'Noto Sans Tamil', sans-serif !important;
                font-style: normal;
            }
        </style>
    @break

    @default
        {{-- <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
        <style>
            * {
                font-family: 'Inter', sans-serif !important;
                font-style: normal;
            }
        </style> --}}
@endswitch
