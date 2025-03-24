<div>
    @if(!$isSubscribed)

    <style>
        /* Shadow */
        #main .popupsub {
            background-color: rgba(255, 255, 255);
            color: #020202;
            font-weight: 600;
            font-size: 20px;
            line-height: 1.5em;
            text-shadow: rgba(0, 0, 0, 0.3) 0px 1px 1px;
            letter-spacing: 0.4px;
            word-spacing: 2.9px;
            position: relative;
            top: -59px;
        }
        /* Shadow */
#main div .popupsub{
 padding-top:5px;
 padding-bottom:5px;
}
/* Vcard */
#isVcard{
 border-color:#0d36a0;
 border-width:3px;
 border-top-left-radius:50px;
 border-top-right-radius:50px;
 border-bottom-left-radius:50px;
 border-bottom-right-radius:50px;
 width:18px;
 height:18px;
}

/* Label */
.sign-in-form .form-check label{
 color:#393131;
 position:relative;
 top:1px;
}
/* Password */
#password{
 font-weight:700;
 border-color:#5d7083;
}

/* Form label */
.sign-in-form .mb-3 .form-label{
 margin-bottom:3px;
 display:none;
}



/* Label */
#main div #subscribeModal .modal-content section .sign-in-form .mb-3 .form-check label{
 font-weight:600 !important;
}


        @media (max-width:991px) {

            /* Shadow */
            /* #main .shadow {
                top: 31px;
            } */

        }

        @media (min-width:992px) {

            /* Hentry */
            #main .hentry {
                position: relative;
                top: -23px;
            }

        }
        .modalx {
            display: none;
            position: fixed;
            /* z-index: 1; */
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.4);
            opacity: 0;
            transition: opacity 0.5s ease-in-out;
        }
        .modal-contentx {
            background-color: #fefefe;
            margin: 10% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 90%;
            max-width: 400px;
        }
        .closex {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
        .modalx.show {
            display: block;
            opacity: 1;
        }
        /* Close */
#subscribeModal .close{
 height:38px;
 text-align:right;
 color:#020202;
 font-size:30px;
}

/* Modal content */
#subscribeModal .modal-contentx{
 padding-top:3px;
}

/* Label */
.sign-in-form .mb-3 label{
 font-weight:400 !important;
 font-size:14px;
}

/* City */
#city{
 font-weight:500;
}

/* Name */
#name{
 font-weight:600;
 border-color:#4f6790;
}

/* Phone */
#phone{
 font-weight:600;
 border-color:#858e9d;
}
/* #openModalx img{
 width:581px;
} */
@media (max-width:480px){

/* Popupsub */
#main div .popupsub{
 top:49px;
}

}
/* Hentry */
#wrapper #core .core__inner #columns .columns__inner .lsvr-container .lsvr-grid .columns__main #main .main__inner .hentry{
 bottom:auto !important;
}

@media (min-width:992px){

 /* Hentry */
 #main .hentry{
  top:-51px !important;
 }

}
/* Heading */
#openModalx h3{
 font-size:23px;
 line-height:1.5em;
}

@media (max-width:1316px){

 /* Heading */
 #openModalx h3{
  font-size:12px;
 }

}

@media (max-width:768px){

 /* Heading */
 #openModalx h3{
  font-size:13px;
 }

}

@media (max-width:480px){

 /* Heading */
 #openModalx h3{
  font-size:33px;
 }

}

    </style>

    <div class="text-center">
        <div class="shadow popupsub">
            <a href="javascript:void(0)" class="text-dark" style="text-decoration:none;" id="openModalx">
                <h3>प्रारंग के {{$portal->city_name_local}} दैनिक पोस्ट (Post) को प्रतिदिन WhatsApp पर पाए</h3>
                <img src="@switch($banner)
                    @case('sub-2')
                        {{ asset('images/sub-6-bg.png') }}
                        @break

                    @default
                       {{ asset('images/sub-main-bg.png') }}

                @endswitch" alt="">
            </a>
        </div>
    </div>

    <!-- Modal -->
    <div id="subscribeModal" class="modal modalx" wire:ignore.self>
        <div class="modal-content modal-contentx">
            <span class="close closex">&times;</span>
            @if($showWelcome)
            <section>
                <h3 class="text-center text-primary mb-3">आपका स्वागत है</h3>
                <p class="text-center">प्रारंग के साथ जुड़ने के लिए धन्यवाद.</p>
    @else
            <section>
                <form wire:submit.prevent="register" class="sign-in-form">
                    <h3 class="text-center text-primary mb-3">प्रतिदिन मुफ़्त लेख प्राप्त करे </h3>

                    <!-- City Selection -->
                    <div class="mb-3">
                        <label for="city" class="form-label fw-bold">शहर चुनें:</label>
                        <select wire:change="validatePhone('city')" wire:model="city" id="city"
                            class="form-select @error('city') is-invalid animate__animated animate__headShake @enderror">
                            <option value="">कृपया शहर चुनें</option>
                            @foreach ($cities as $option)
                                <option value="{{ $option->id }}">{{ $option->name }}</option>
                            @endforeach
                        </select>
                        @error('city')
                            <small class="text-danger animate__animated animate__headShake">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Name Input -->
                    <div class="mb-3">
                        <label for="name" class="form-label fw-bold">नाम:</label>
                        <input type="text" wire:model="name" wire:change="validatePhone('name')" id="name"
                            class="form-control @error('name') is-invalid animate__animated animate__headShake @enderror"
                            placeholder="नाम">
                        @error('name')
                            <small class="text-danger animate__animated animate__headShake">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Phone Input -->
                    <div class="mb-3">
                        <label for="phone" class="form-label fw-bold">फोन नंबर:</label>
                        <input type="text" wire:change="validatePhone('phone')" wire:model.debounce.250ms="phone"
                            id="phone"
                            class="form-control @error('phone') is-invalid animate__animated animate__headShake @enderror"
                            placeholder="फोन नंबर">
                        @error('phone')
                            <small class="text-danger animate__animated animate__headShake">{{ $message }}</small>
                        @enderror
                    </div>



                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" wire:model.="isVcard" wire:change="checkedVcard" id="isVcard">
                            <label class="form-check-label" for="isVcard">
                                अपना मुफ़्त वेबपेज भी बनाएं
                            </label>
                        </div>
                    </div>

                    @if($showPassword)
                      <!-- Password Input -->
                    <div class="mb-3">
                        <label for="password" class="form-label fw-bold">पासवर्ड:</label>
                        <input type="password" wire:change="validatePhone('password')" wire:model="password"
                            id="password"
                            class="form-control @error('password') is-invalid animate__animated animate__headShake @enderror"
                            placeholder="पासवर्ड दर्ज करे ">
                        @error('password')
                            <small class="text-danger animate__animated animate__headShake">{{ $message }}</small>
                        @enderror
                    </div>
                    @endif
                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary w-100 fw-bold">
                        <span wire:loading.remove>सब्सक्राइब करें</span>
                        <span wire:loading class="spinner-border spinner-border-sm"></span>
                    </button>
                </form>
            </section>
    @endif
        </div>
    </div>

    <script>
        // Get the modal
        var modal = document.getElementById("subscribeModal");

        // Get the button that opens the modal
        var btn = document.getElementById("openModalx");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("closex")[0];

        // When the user clicks the button, open the modal
        btn.onclick = function() {
            modal.classList.add("show");
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.classList.remove("show");
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.classList.remove("show");
            }
        }
    </script>
 @endif
</div>
