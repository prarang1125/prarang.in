@extends('yellowpages::layout.auth')

@section('title', 'Register')
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
#name{
 padding-bottom:6px !important;
}
/* Heading */
.card .sign-in-form h2{
 color:#020202 !important;
}
.logo-sec { 
  display: flex; 
  flex-direction: row; 
  justify-content: center; 
  align-items: center;
} 

*,:after,:before { 
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
.row .ldiv{
 width:750px;
 min-height:16px !important;
 height:56vh;
}

/* Col 6 */
.row .col-sm-6{
 display:flex;
 flex-direction:column;
 justify-content:center;
 align-items:center;
 transform:translatex(0px) translatey(0px);
}

/* Image */
.row .col-sm-6 > div > img{
 width:60% !important;
 display:inline-block;
 transform:translatex(0px) translatey(0px) !important;
}

/* Ldiv */
.row .ldiv{
 height:51px !important;
}

/* Division */
.row .col-sm-6 > div{
 display:flex;
 justify-content:center;
}


@media (max-width:576px){

  /* Logo sec */
  .row .ldiv .logo-sec{
   justify-content:center;
   padding-top:65px;
  }
  
  /* Logo sec */
  .row .col-sm-6 .ldiv .logo-sec{
   width:100% !important;
  }
  
  /* Ldiv */
  .row .col-sm-6 .ldiv{
   width:100% !important;
  }
  
  /* Image */
  .row .col-sm-6 > div > img{
   display:none !important;
  }
  
  /* Flex */
  .row .col-sm-6 div .d-flex{
   min-height:625px !important;
   height:625px;
  }
  
 }

 /* Body */
body{
 {{-- background-image:url("file:///C:/Users/vivek/Downloads/Fluid@1x-100.0s-1592px-830px%20(1).svg"); --}}
 background-size:cover;
 background-attachment:fixed;
 background-repeat:repeat-x;
 background-position-y:0%;
 background-position-x:100%;
}
/* Svg */
svg{
 position:fixed;
 transform: rotateY(180deg) rotateZ(9deg);
}

/* Svg */
svg{
 top:-171px;
 transform: rotateZ(-180deg) !important;
 height:975px !important;
 width:1373px !important;
}

@media (max-width:576px){

 /* Svg */
 svg{
  width:898px !important;
  height:497px !important;
  transform: rotateX(35deg) rotateY(-5deg) rotateZ(180deg) !important;
 }
 
}
/* Button */
.card .sign-in-form .btn-primary{
 margin-top:7px;
}

/* Division */
.card .sign-in-form .mb-3{
 {{-- transform:translatex(0px) translatey(0px); --}}
}

/* Password */
#password{
 margin-top:-6px;
}


/* Hero */
.row .hero-txt{
 display:flex;
 margin-top:24px;
 align-self:center;
 flex-direction:column;
 align-items:center;
}

/* Paragraph */
.row .hero-txt p{
 font-weight:700;
}


/* Subtxth */
.row .hero-txt .subtxth{
 margin-bottom:5px;
 margin-top:-13px;
 font-weight:500;
}

/* Paragraph */
.row .hero-txt p{
 font-size:17px;
 line-height:1.5em;
}

/* Hero */
.row .hero-txt{
 margin-top:32px !important;
}

/* Image */
.ldiv .logo-sec img{
 padding-bottom:9px;
}

/* Style */
#style-kRBjZ{
 padding-top:4px;
}

/* Paragraph */
.ldiv .logo-sec p{
 min-height:75px;
}

@media (max-width:576px){

 /* Hero */
 .row .hero-txt{
  margin-top:57px !important;
  padding-top:9px;
  {{-- transform:translatex(0px) translatey(0px); --}}
  padding-left:30px;
  padding-right:45px;
 }
 
 /* Subtxth */
 .row .hero-txt .subtxth{
  display:block;
  white-space:pre-wrap;
  text-align:center;
 }
 
 /* Flex */
 .row .col-sm-6 div .d-flex{
  {{-- transform:translatex(0px) translatey(-59px); --}}
 }
 
 /* Logo sec */
 .row .ldiv .logo-sec{
  padding-top:78px !important;
 }
 
}
@keyframes confetti-fall {
  0% { transform: translate(0, 0) rotate(0deg); opacity: 1; }
  100% { transform: translate(calc(200px * var(--dirX)), calc(-250px * var(--dirY))) rotate(720deg); opacity: 0; }
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
.row div .card{
 box-shadow:0px 16px 48px 26px rgba(0,0,0,0.176) !important;
 transform:translatex(0px) translatey(0px);
}

/* Heading */
.card section h1{
 text-align:center;
 font-weight:700;
 font-size:38px;
 color:#0d951f;
 margin-bottom:22px;
}

/* Paragraph */
.card section p{
 font-weight:600;
}

/* Paragraph */
.card section p{
 text-align:center;
 margin-bottom:22px;
}

/* Heading */
.card section h1{
 margin-bottom:0px !important;
}


    </style>

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
          <p>देश का पहला, हिंदी में येलो पेज(YellowPage)</p>
          <p class="subtxth">अपने व्यवसाय को मुफ़्त में ऑनलाइन करें | साथ ही, अपनी खुद की मुफ़्त वेबसाइट बनाएं |</p>
          </div>
          <div>
            <img src="{{ asset('assets/images/Mobile-login-rafiki.png') }}" alt="">
          </div>

        </div>
        <div class="col-sm-6">
            @livewire('yellow-pages.elements.new-accounts')</div>

    </div>



@endsection
