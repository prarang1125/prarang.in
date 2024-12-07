<x-layout.main.base>
    <style>
        /* Image */
.align-items-center .fw-bold img{
 width:27px;
 margin-right:14px;
}

/* Link */
.align-items-center a{
 display:flex;
 justify-content:center;
 align-items:center;
}

    </style>
<section>
    @if ($cityCode!=null)
        
  
    <div class="m-4 rounded shadow p-2 text-center">
    <h2>Archive</h2> <br>
    <div
        class="row justify-content-center align-items-center g-2">
        <div class="col-sm-4"><div class="p-1 rounded shadow border justify-content-center align-content-center text-center mb-2 mt-1" style="min-height: 60px;"><a class="text-center text-dark fw-bold fs-5" style="text-decoration: none;"  href="{{route('archive-catg',['cityCode'=>$cityCode ,'catg'=>'time'])}}"><img src="http://rangmala.com/img/samay-sima.png">Time</a></div></div>
        <div class="col-sm-4"><div class="p-1 rounded shadow border justify-content-center align-content-center text-center mb-2 mt-1" style="min-height: 60px;"><a class="text-center text-dark fw-bold fs-5" style="text-decoration: none;"  href="{{route('archive-catg',['cityCode'=>$cityCode ,'catg'=>'work'])}}"><img src="http://rangmala.com/img/work.png">Work</a></div></div>
        <div class="col-sm-4"><div class="p-1 rounded shadow border justify-content-center align-content-center text-center mb-2 mt-1" style="min-height: 60px;"><a class="text-center text-dark fw-bold fs-5" style="text-decoration: none;"  href="{{route('archive-catg',['cityCode'=>$cityCode ,'catg'=>'education'])}}"><img src="http://rangmala.com/img/education.png">Education</a></div></div>
        <div class="col-sm-4"><div class="p-1 rounded shadow border justify-content-center align-content-center text-center mb-2 mt-1" style="min-height: 60px;"><a class="text-center text-dark fw-bold fs-5" style="text-decoration: none;"  href="{{route('archive-catg',['cityCode'=>$cityCode ,'catg'=>'place'])}}"><img src="http://rangmala.com/img/place.png">Place</a></div></div>
        <div class="col-sm-4"><div class="p-1 rounded shadow border justify-content-center align-content-center text-center mb-2 mt-1" style="min-height: 60px;"><a class="text-center text-dark fw-bold fs-5" style="text-decoration: none;"  href="{{route('archive-catg',['cityCode'=>$cityCode ,'catg'=>'emotion'])}}"><img src="http://rangmala.com/img/emoticons.png">Emotion</a></div></div>
    </div>
    
</div>
@else
<div class="m-4 rounded shadow p-2 text-center p-3">
    <h2>Archive</h2>
    <div class="row">
        @foreach ($portal as $item)
            <div class="city-a col-sm-2 p-1 rounded border border-primary m-1 ">
                <a target="_blank" class="text-primary fw-bold fs-6" style="text-decoration: none; "
                    href="{{ route('archive', ['cityCode' => $item->slug]) }}">{{ $item->city_name }}</a>
            </div>
        @endforeach
    </div>
</div>
@endif
</section>

</x-layout.main.base>