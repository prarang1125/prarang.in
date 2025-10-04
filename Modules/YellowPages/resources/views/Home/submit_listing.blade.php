{{-- @extends('yellowpages::layout.script')

@section('title', __('messages.yellow_pages'))

@section('content') --}}
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .thank-you-container {
            background-color: #fff;
            padding: 40px;
            text-align: center;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }
        .thank-you-container h1 {
            font-size: 28px;
            color: #4CAF50;
            margin-bottom: 20px;
        }
        .thank-you-container p {
            font-size: 16px;
            color: #555;
            margin: 10px 0;
        }
        .back-home-btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 16px;
            color: white;
            background-color: #4CAF50;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s;
        }
        .back-home-btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <div class="thank-you-container">
        <h1>आपकी सूची सफलतापूर्वक जोड़ी गई है!</h1>
        <p>हम आपके योगदान की सराहना करते हैं और शीघ्र ही आपकी प्रस्तुति की समीक्षा देखे।</p>
        <a href="{{route('vCard.business-listing')}}" class="back-home-btn">वापस जाएं</a>
    </div>
    

{{-- @endsection
@push('scripts')
@endpush --}}
