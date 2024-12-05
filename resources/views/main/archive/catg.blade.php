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
.city-a:hover {
    background: #326de5;
  

}
.city-a:hover a {
    /* background: #326de5; */
    color: white !important;

}

    </style>
<section>
    
        @switch($catg)
            @case('time')
                <div class="p-3 mt-3 shadow">
                    <h1 class="text-center">Time</h1>
                    <div class="row">    
                        @foreach($portal as $item)
                        <div class="city-a col-sm-3 p-1 rounded border border-primary m-1 ">
                            <a target="_blank"  class="text-primary fw-bold fs-6" style="text-decoration: none; " href="{{route('posts.city',['city'=>$item->slug])}}">{{$item->city_name}}</a></div>
                        @endforeach  
                    </div>
                   
                </div>
                @break
    
            @case('work')
                <div>
                    <h1>Work Category</h1>
                    <p>Add your work-related content here.</p>
                </div>
                @break
    
            @case('education')
                <div>
                    <h1>Education Category</h1>
                    <p>Add your education-related content here.</p>
                </div>
                @break
    
            @case('workemotion')
                <div>
                    <h1>Work Emotion Category</h1>
                    <p>Add your work emotion-related content here.</p>
                </div>
                @break
    
            @default
                <div>
                    <h1>Default Category</h1>
                    <p>No category matched. Add your default content here.</p>
                </div>
        @endswitch
 
    
    
</div>
</section>

</x-layout.main.base>