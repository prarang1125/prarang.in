<x-layout.main.base>
    <style>
 
        main .top-title small{
         font-size:12px;
        
        }
        /* Text end */
        .container .text-end{
         margin-bottom:0px;
         position:relative;
         top:-19px;
         margin-right:59px;
        }
        
        /* Top heading */
        .container .bs5-top-heading{
         height:60px;
        }
        
        @media (max-width:576px){
        
         /* Text end */
         .container .text-end{
          top:-2px;
          transform:translatex(0px) translatey(0px);
          text-align:center !important;
          margin-right:0px;
         }
         
        }
        /* Col 6 */
.container .col-sm-6{
 display:flex;
 justify-content:center;
 align-items:center;
}

/* Image */
.container a img{
 width:270px !important;
 display:inline-block;
 {{-- transform:translatex(0px) translatey(0px) !important; --}}
}

/* Img flud */
.container .col-sm-6:nth-child(2) .img-flud{
 width:571px !important;
}

/* Border */
.container .border{
 border-color:#ffffff !important;
}

/* Button */
.container .col-sm-6:nth-child(1) .border:nth-child(1) .btn-primary{
 width:265px;
}


        </style>
        <section class="bs5-top-heading">
                    <p class="">Analytics</p>
                    <p>Geographic Intelligence through Comparison</p>
        </section>
        <p class="text-end">
        <a href="https://g2c.prarang.in/login" class="btn btn-warning btn-sm">Partner Login</a></p>
        <section class="container">
              <p>Prarang's Geographic Intelligence is a comprehensive big data solution that provides valuable insights into various geographic regions in India and across the world. It is a powerful solution that provides businesses with the data they need to plan their global expansion, understand regional development disparities in India, select the best entry points for market expansion, and run successful advertising campaigns in local languages, tailored to specific regional preferences. With access to these crucial insights, companies & governments/NGOs can make data-driven decisions and thrive by going hyper-local in today's competitive business market.</p>
              
                <div class="row">
                        <div class="col-sm-6">
                           
                            <div class="text-center p-2 border">
                                <a  href="https://g2c.prarang.in/india" class="btn btn-lg btn-primary rounded-0">
                                            India Analytics
                                </a> 
                                <div class="p-2">
                               <a  href="https://g2c.prarang.in/india"> <img class="img-flud w-75" src="https://www.prarang.in/matric-.JPG" ></a></div>
                            </div>
                            <div class="text-center p-2 border">
                                <a  href="https://g2c.prarang.in/czech-republic" class="btn btn-lg btn-primary rounded-0">
                                    Czech Republic Analytics
                                </a> 
                                <div class="p-2">
                               <a  href="https://g2c.prarang.in/czech-republic"> <img class="img-flud w-75" src="https://www.prarang.in/matric-.JPG" ></a></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="text-center p-2 border ">
                                        <a href="https://g2c.prarang.in/world" class="btn btn-lg btn-primary rounded-0">
                                            World Analytics
                                        </a>    
                                         <div class="p-2">
                               <a href="https://g2c.prarang.in/world"><img class="img-flud w-75" src="https://www.prarang.in/matric-.JPG" ></a></div>
                            </div>
                            </div>
                        </div>
                </div>
                
              </section>
</x-layout.main.base>