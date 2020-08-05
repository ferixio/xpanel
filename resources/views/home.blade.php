@extends('layouts.public')
@section('content')

<style>
  @media screen and (max-width:960px){
    .content-img_thumb{
      height: 43vw !important;
    }
    .content-title{
      line-height: 17px !important
    }
   
  } 
</style>
    <section id="top-banner" class="uk-background-norepeat uk-background-bottom-right x-fullheight uk-text-left@m uk-text-center " style="background-image: url({{asset('storage/uploads/page/bg.png')}});max-height:700px">
      <div class="uk-container uk-height-1-1 uk-flex-center uk-flex uk-flex-column uk-padding uk-visible@m">

        <p class="x-font-64 uk-text-capitalize uk-text-bold x-color-theme-public-text" style="line-height: 80px;">You Looking  for  <br>  a professional talent ?</p>
        <p class="x-font-24" style="max-width:650px;">We are here for you. Bringing innovation with technology, beautiful design and security system.</p>
        <a href="#" title="Explore more" class="uk-button uk-button-default uk-margin-medium-top" style="width:170px;"> Explore More </a>
      </div>
    </section>
    <hr class="uk-container">
    
    <section class="uk-container uk-margin-large-top">
      <div class="uk-text-center">
        <h2 class="uk-text-bold uk-text-capitalize">What We offer for you ?</h2>
        <p class="uk-align-center uk-text-lowercase" style="max-width:550px">What you need for your bussiness? Marketing online, Design Promotion Or even Management system. We'll give you all of these.
        </p>
        <div class="uk-grid uk-grid-small uk-margin-medium-top" style="min-height:100vh">
          <div class="uk-width-auto@m uk-width-1-1 uk-padding uk-text-center uk-flex uk-flex-column uk-margin-large-top">
            <h3 class="uk-text-bold uk-uppercase ">Website</h3>
            <p class="uk-align-center  uk-margin-remove-vertical" style="max-width:350px">Tell what your bussiness is, Expand your market and get more customer with your own website. Make it real with our product <br> <b>LAXAVEL</b> </p>
            <a href="#" title="Explore more" class="uk-button uk-button-default uk-margin-medium-top uk-align-center  " style="width:170px;"> Explore More </a>

          </div>
          <div class="uk-width-expand@m uk-width-1-1">
            <div uk-slider="autoplay: true;autoplay-interval: 3000;pause-on-hover:false">
              <ul class="uk-slider-items uk-child-width-1-1 uk-grid">
                <li>
                  <img data-src="{{asset('storage/uploads/page/uiux1.jpg')}}" alt="" srcset="" uk-img>
                </li>
                <li>
                  <img data-src="{{asset('storage/uploads/page/uiux2.jpg')}}" alt="" srcset="" uk-img>
                </li>
                <li>
                  <img data-src="{{asset('storage/uploads/page/uiux3.jpg')}}" alt="" srcset="" uk-img>
                </li>
              </ul>
            </div>
          </div>
          <div class="uk-width-1-1 uk-margin-large-top">
            <ul class="uk-child-width-1-3@m uk-child-width-1-1 uk-grid">

              <li>
                <div class="uk-card uk-card-hover uk-padding">
                  <div class="uk-card-media-top">
                    <img src="{{asset('storage/uploads/page/uiux_onlineshop.jpg')}}" alt="">
                  </div>
                  <div class="uk-card-body">
                    <h3>Online shop</h3>
                    <p>Selling your products to customer  with your own website </p>
                    <div>
                      <a title="home" href="{{url('/')}}" class="x-color-theme-text x-font-16  uk-button-text uk-text-bold">See Example</a>
                    </div>
                  </div>
                </div>
              </li>
              
              
              <li>
                <div class="uk-card uk-card-hover uk-padding">
                  <div class="uk-card-media-top">
                    <img src="{{asset('storage/uploads/page/uiux_company.jpg')}}" alt="">
                  </div>
                  <div class="uk-card-body">
                    <h3>Company Profile</h3>
                    <p>Share what your bussiness are, and share information to others.</p>
                    <div>
                      <a title="home" href="{{url('/')}}" class="x-color-theme-text x-font-16  uk-button-text uk-text-bold">See Example</a>
                    </div>
                  </div>
                </div>
              </li>
              
              
              <li>
                <div class="uk-card uk-card-hover uk-padding">
                  <div class="uk-card-media-top">
                    <img src="{{asset('storage/uploads/page/uiux_news.jpg')}}" alt="">
                  </div>
                  <div class="uk-card-body">
                    <h3>News and Article</h3>
                    <p>Website for giving some people information and education.</p>
                    <div>
                      <a title="home" href="{{url('/')}}" class="x-color-theme-text x-font-16  uk-button-text uk-text-bold">See Example</a>
                    </div>
                  </div>
                </div>
              </li>
              

            </ul>
          </div>

          <hr class="uk-width-1-1 uk-margin-medium">
          
          <div class="uk-grid uk-grid-small uk-margin-medium-top">
            
            <div class="uk-width-expand@m uk-width-1-1">
              <img data-src="{{asset('storage/uploads/page/seo.png')}}" alt="" srcset="" uk-img>
              </div>
              
              <div class="uk-width-auto@m uk-width-1-1 uk-padding uk-text-center uk-flex uk-flex-column uk-margin-large-top">
                <h3 class="uk-text-bold uk-uppercase ">SEO and Online Marketing</h3>
                <p class="uk-align-center  uk-margin-remove-vertical" style="max-width:400px">Your website is not showing on first page google? <br> <b class="x-color-theme-text">Call Us</b>  We have solution for you. </b> </p>
                <a href="#" title="Explore more" class="uk-button uk-button-default uk-margin-medium-top uk-align-center  " style="width:210px;"> More Information </a>
    
              </div>
              
          </div>
       
        </div>
      </div>
      <hr class="uk-width-1-1 uk-margin-medium">
    </section>

       
    <div class="uk-margin-xlarge uk-container" style="">

      <div class="  uk-child-width-1-2@m uk-child-width-1-1  uk-grid uk-text-center">
        <div class="uk-padding uk-padding-large">
          <h3 class="uk-text-bold uk-uppercase x-font-64">Design and Animation</h3>
          <hr>
          <p class="uk-align-center  uk-margin-remove-vertical" style="max-width:400px">Make your product more interesting with a good conceptual design for promotion.</p>    
        </div>
        <div class="uk-background-cover uk-height-medium" data-src="{{asset('storage/uploads/page/kaktus.gif')}}" alt="" srcset="" uk-img >
        </div>
      </div>

      <div class="uk-width-1-1 uk-margin-large-top">
        <ul class="uk-child-width-1-4@m uk-child-width-1-2 uk-grid uk-grid-match">

          <li class="uk-margin-medium-top">
            <div class="uk-card uk-card-default uk-padding-small">
              <div class="uk-card-media-top uk-border-rounded uk-overflow-hidden">
                <img src="{{asset('storage/uploads/page/namecard.jpg')}}" alt="">
              </div>
              <div class="uk-card-body">
                <h3 class="uk-text-center uk-text-bold x-font-16 uk-text-uppercase">Name Card</h3>
                
              </div>
            </div>
          </li>
          
          
          <li class="uk-margin-medium-top">
            <div class="uk-card uk-card-default uk-padding-small">
              <div class="uk-card-media-top uk-border-rounded uk-overflow-hidden">
                <img src="{{asset('storage/uploads/page/food.jpg')}}" alt="">
              </div>
              <div class="uk-card-body">
                <h3 class="uk-text-center uk-text-bold x-font-16 uk-text-uppercase">Banner</h3>
                
              </div>
            </div>
          </li>
          
          
          <li class="uk-margin-medium-top">
            <div class="uk-card uk-card-default uk-padding-small">
              <div class="uk-card-media-top uk-border-rounded uk-overflow-hidden">
                <img src="{{asset('storage/uploads/page/logo.jpg')}}" alt="">
              </div>
              <div class="uk-card-body">
                <h3 class="uk-text-center uk-text-bold x-font-16 uk-text-uppercase">Logo</h3>
               
              </div>
            </div>
          </li>
          
          <li class="uk-margin-medium-top">
            <div class="uk-card uk-card-default uk-padding-small">
              <div class="uk-card-media-top  uk-border-rounded uk-overflow-hidden">
                <img src="{{asset('storage/uploads/page/video.jpg')}}" alt="">
              </div>
              <div class="uk-card-body">
                <h3 class="uk-text-center uk-text-bold x-font-16 uk-text-uppercase">Video Promotion</h3>
                
              </div>
            </div>
          </li>
          

        </ul>
      </div>
     
    </div>

    <hr class="uk-container">
    
    <div class="uk-margin-xlarge uk-container" style="">

      <div class="  uk-child-width-1-2@m uk-child-width-1-1  uk-grid uk-text-left@m uk-text-center">
        <div class="uk-background-contain" data-src="{{asset('storage/uploads/page/desktop.gif')}}" alt="" srcset="" uk-img style="min-height: 300px">
        </div>
        <div class="uk-padding uk-padding-large uk-padding-remove-horizontal ">
          <h3 class="uk-text-bold uk-uppercase x-font-64">Application for Management</h3>
          <hr>
          <p class="uk-margin-remove-vertical uk-align-center uk-align-left@m" style="max-width:500px">Do you feel inconvenience about financial report, Customer complain and stock management? we bringing easer way to can handle that. <br><br> You can try  our application for management<br> <b>Fercova Manggo X5</b> </p> 
          <a href="#" title="Explore more" class="uk-button uk-button-default uk-margin-medium-top" style="width:210px;"> More Information </a>
          
          
        </div>
      </div>
    </div>
    

    <div class="uk-margin-medium uk-container" style="">

      <div class="  uk-child-width-1-1 uk-grid uk-text-center">
        <div class="uk-padding uk-padding-large">
          <h3 class="uk-text-bold uk-uppercase x-font-32">.NET board</h3>
          <hr>
          <p class="uk-align-center  uk-margin-remove-vertical" style="max-width:500px">We always share usefull information on Our <b>.NET board</b> <br> because we believe share and care something usefull can make our live better.</p>    
        </div>
        
      </div>
      
      <div class="uk-width-expand">
        <div uk-slider="">
          <ul class="uk-slider-items uk-padding uk-child-width-1-4@m uk-child-width-1-2 uk-grid uk-grid-small">
            
            @for ($i = 0; $i < 10; $i++)
           <li>
             <div class="uk-card uk-card-default uk-padding-small">
              <div class="uk-card-media-top uk-border-rounded uk-overflow-hidden">
                <img src="{{asset('storage/uploads/page/food.jpg')}}" alt="">
              </div>
              <div class="uk-card-body uk-padding-remove">
                <h3 class="uk-text-center uk-text-bold x-font-16 uk-text-uppercase uk-padding-small">Banner</h3>
                
              </div>
            </div>
          </li>
          
           @endfor
           
          </ul>
        </div>
      </div>
      
    </div>
    
    
    
    <hr class="uk-container">
    
    <h3 class="uk-text-bold uk-uppercase x-font-32 uk-text-center">Our Clients</h3>
    <div class="uk-container uk-padding-remove-horizontal ">
      {{-- <hr class="uk-margin-remove"> --}}
      
      <div class="uk-width-1-1 uk-padding">
        <div uk-slider="autoplay: true;pause-on-hover:false;autoplay-interval:3500">
          <ul class="uk-slider-items  uk-child-width-1-6@m uk-child-width-1-4 uk-grid uk-flex uk-flex-middle">
            <li class="uk-padding">
              <img data-src="{{asset('storage/uploads/page/clients/els.png')}}" alt="" uk-img>
            </li>
            <li class="uk-padding">
              <img data-src="{{asset('storage/uploads/page/clients/louise.png')}}" alt="" uk-img>
            </li>
            <li class="uk-padding">
              <img data-src="{{asset('storage/uploads/page/clients/jelajah.jpg')}}" alt="" uk-img>
            </li>
            <li class="uk-padding">
              <img data-src="{{asset('storage/uploads/page/clients/perumda.jpg')}}" alt="" uk-img>
            </li>
            <li class="uk-padding">
              <img data-src="{{asset('storage/uploads/page/clients/defurniture.png')}}" alt="" uk-img>
            </li>
            <li class="uk-padding">
              <img data-src="{{asset('storage/uploads/page/clients/nilamsari.png')}}" alt="" uk-img>
            </li>
            <li class="uk-padding">
              <img data-src="{{asset('storage/uploads/page/clients/sugarpastry.jpg')}}" alt="" uk-img>
            </li>
          
            
          </ul>
        </div>
      </div>
      
      
    </div>

   


    <div class="uk-container uk-margin-large-top">
      <div class="uk-padding-large   uk-grid uk-text-center">
        <div class="uk-padding uk-width-expand@m uk-width-1-1 uk-padding-large">
          <h3 class="uk-text-bold uk-uppercase x-font-64">Join with us</h3>
          <hr>
          <p class="uk-align-center  uk-margin-remove-vertical" style="max-width:400px">We always welcome for new talent who have amazing skill, if you one of that guy  lets join with us to be an amazing talent. </p>
          <div>
           
            <a href="#" title="Explore more" class="uk-button uk-button-default uk-margin-medium-top"> To be Amazing Talent </a>
          </div>   
          
        </div>
        <div class="uk-width-auto@m uk-width-1-1">
          <img data-src="{{asset('storage/uploads/page/sarah.jpg')}}" uk-img alt="" srcset="" class="uk-border-circle">
        </div>
      </div>
  
    </div>

    
    <blockquote cite="#" class="uk-text-center uk-margin-xlarge uk-width-1-1">
      <p class="uk-margin-small-bottom">"Share and care can make our live to be better."</p>
    <footer>See all usefull information <cite><a href="{{url('/')}}" class="x-color-theme-text uk-text-bold">Explore more</a></cite></footer>
    </blockquote>


@endsection