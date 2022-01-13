@extends('layouts.public')
@section('content')
<style>
  .x-color-red-text{
    color:#E81133;
  }
  .uk-button-default , .uk-button-default-white-hover{
    background-color:#E81133 !important;
    border-color: #E81133 !important;
  }
  .uk-button-default:hover{
    color:#E81133 !important;
  }
  .uk-button-default-white-hover:hover{
    color:white !important;
    border-color:white !important;
  }
</style>

<section  id="top-banner" class="uk-background-norepeat uk-background-bottom-right x-fullheight" style="background-image: url({{asset('storage/uploads/page/banner-web.jpg')}});background-color:#F5F5F5">
  <div class="uk-height-1-1 uk-flex-center uk-flex uk-flex-column uk-padding-large uk-visible@m">
    <h1 class="uk-hidden">XIT foundation - jasa pembuatan website / bikin website  di jepara</h1>
    <a href="#website" class="uk-hidden">XIT foundation - jasa pembuatan website / bikin website  di jepara</a>

    <p class="x-font-64 uk-text-capitalize uk-text-bold  x-color-red-text" style="line-height: 80px;">LAXAVEL</p>
    <p class="x-font-24 uk-padding" style="max-width:650px;background-color:rgba(255, 255, 255, 0.74)">Stunning template website from XIT foundation. It's totally Simply and Crazy Fast website ever</p>
    <div class="uk-flex">
      <a href="#pricelist" title="Explore more" class="uk-button uk-button-default uk-margin-medium-top" style="width:170px;"> Explore More </a>
    <a href="http://furniture.xitfoundation.com" target="_blank" title="Explore more" class="uk-margin-small-left uk-button uk-button-tosca uk-margin-medium-top" style="width:170px;"> Demo </a>
    </div>
  </div>
</section>

<div class="uk-flex-center uk-flex uk-flex-column uk-padding  uk-text-center uk-hidden@m">

  <p class="x-font-64 uk-text-capitalize uk-text-bold  x-color-red-text" style="line-height: 80px;">LAXAVEL</p>
  <p class="x-font-24" style="max-width:650px;">Stunning template website from XIT foundation. It's totally Simply and Crazy Fast website ever</p>
  
  <div class="uk-flex uk-align-center uk-flex-column">
    <a href="#pricelist" title="Explore more" class="uk-button uk-button-default uk-margin-medium-top" style="width:170px;"> Explore More </a>
  <a href="http://furniture.xitfoundation.com" target="_blank" title="Explore more" class=" uk-button uk-button-tosca uk-margin-small-top" style="width:170px;"> Demo </a>
  </div>
  <hr>
</div>

<section id="price" class="uk-container uk-padding uk-margin-large-top">

  <div class="uk-margin-large uk-text-center">
    <h2 id="pricelist" class="uk-text-bold uk-text-capitalize">Price List of Create a website</h2>
    <p class="uk-align-center" style="max-width:550px">Thousands theme of laxavel ready to use, choose one <br>and  make it into your own.
    </p>
  </div>
 <div class="uk-grid uk-child-width-1-1 uk-child-width-1-4@m uk-text-center uk-grid-small uk-grid-match">
   
  <div class="uk-position-relative uk-margin-medium-top" style="min-height:450px">
     <div class="uk-card uk-padding-small uk-card-default uk-card-hover">
       <h3 class="uk-text-bold uk-margin-medium-top">Free</h3>
       <p class="uk-text-meta">IDR 0 / month</p>
       <hr>
       <ul class="uk-text-left uk-margin-medium-top uk-padding-small">
         <li class="uk-margin-small"><span uk-icon="icon:  triangle-right"></span> Shared Hosting 250MB</li>
         <li class="uk-margin-small"><span uk-icon="icon:  triangle-right"></span> Domain TLD ( .laxavel.com )</li>
         <li class="uk-margin-small"><span uk-icon="icon:  triangle-right"></span> Standart Theme</li>
         <li class="uk-margin-small"><span uk-icon="icon:  triangle-right"></span> 1 User account</li>
       </ul>
      <div class="uk-position-bottom uk-position-small">
        <hr>
        <a href="http://wa.me/{{$wa}}?text=kak mau nyoba website yang gratis bisa kak?" target="_blank" class="uk-button uk-button-default">Order now</a>
      </div>
     </div>
   </div>
   
  <div class="uk-position-relative  uk-margin-medium-top" style="min-height:700px">
     <div class="uk-card uk-padding-small uk-card-default uk-card-hover uk-border-rounded  " style="background: #04788d;color:white;">
       <h3 class="uk-text-bold uk-margin-medium-top x-white-text">Standart</h3>
       <p class="">IDR 62.500,- / month</p>
       <hr>
       <ul class="uk-text-left uk-margin-medium-top uk-padding-small">
          <li class="uk-margin-small"><span uk-icon="icon:  triangle-right"></span>Hosting Standart 1GB</li>
          <li class="uk-margin-small"><span uk-icon="icon:  triangle-right"></span>Domain TLD <br>
          <span class="uk-margin-small-left"> ( .com , .id , .co.id , .online )</span>
          </li>
          <li class="uk-margin-small"><span uk-icon="icon:  triangle-right"></span>Standart Theme</li>
          <li class="uk-margin-small"><span uk-icon="icon:  triangle-right"></span>1 User Account</li>
          <li class="uk-margin-small"><span uk-icon="icon:  triangle-right"></span>1 Email Account</li>
          <li class="uk-margin-small"><span uk-icon="icon:  triangle-right"></span>Free Training</li>
          <li class="uk-margin-small"><span uk-icon="icon:  triangle-right"></span>Support standart</li>
          <li class="uk-margin-small"><span uk-icon="icon:  triangle-right"></span>Renewal hosting + domain <br>
            <b class="uk-margin-medium-left">(IDR 500.000 / year)</b>
          </li>
       </ul>
       <div class="uk-position-bottom uk-position-small">
        <hr>
        <a href="http://wa.me/{{$wa}}?text=kak pesan website yang standart class bisa kak?" target="_blank" class="uk-button uk-button-default-white-hover">Order now</a>
      </div>
     </div>
   </div>
   
  <div class="uk-margin-medium-top">
     <div class="uk-card uk-padding-small uk-card-default uk-card-hover">
       <h3 class="uk-text-bold uk-margin-medium-top">Premium</h3>
       <p class="uk-text-meta">IDR 375.000,- / month</p>
       <hr>
       <ul class="uk-text-left uk-margin-medium-top uk-padding-small">
          <li class="uk-margin-small"><span uk-icon="icon:  triangle-right"></span>Hosting Standart 20GB</li>
          <li class="uk-margin-small"><span uk-icon="icon:  triangle-right"></span>Domain TLD <br>
          <span class="uk-margin-small-left"> ( .com , .id , .co.id , .online )</span>
          </li>
          <li class="uk-margin-small"><span uk-icon="icon:  triangle-right"></span>Premium Theme</li>
          <li class="uk-margin-small"><span uk-icon="icon:  triangle-right"></span>SEO Optimation</li>
          <li class="uk-margin-small"><span uk-icon="icon:  triangle-right"></span>Multi User Account</li>
          <li class="uk-margin-small"><span uk-icon="icon:  triangle-right"></span>Multi Email Account</li>
          <li class="uk-margin-small"><span uk-icon="icon:  triangle-right"></span>Free Training</li>
          <li class="uk-margin-small"><span uk-icon="icon:  triangle-right"></span>Support Premium</li>
          <li class="uk-margin-small"><span uk-icon="icon:  triangle-right"></span>Renewal hosting + domain <br>
            <b class="uk-margin-medium-left">(IDR 2.500.000 / year)</b></li>
       </ul>
       <hr>
       <a href="http://wa.me/{{$wa}}?text=kak pesan website yang Premium class bisa kak?" target="_blank"   class="uk-button uk-button-default">Order now</a>
     </div>
   </div>
   
  <div class="uk-margin-medium-top">
     <div class="uk-card uk-padding-small uk-card-default uk-card-hover">
       <h3 class="uk-text-bold uk-margin-medium-top">Exclusive</h3>
       <p class="uk-text-meta">IDR 625.000,- / month</p>
       <hr>
       <ul class="uk-text-left uk-margin-medium-top uk-padding-small">
          <li class="uk-margin-small"><span uk-icon="icon:  triangle-right"></span>Hosting Standart 40GB</li>
          <li class="uk-margin-small"><span uk-icon="icon:  triangle-right"></span>Domain TLD <br>
          <span class="uk-margin-small-left"> ( .com , .id , .co.id , .online )</span>
          </li>
          <li class="uk-margin-small uk-text-bold uk-color-theme-text"><span uk-icon="icon:  triangle-right"></span>Exlusive Theme</li>
          <li class="uk-margin-small"><span uk-icon="icon:  triangle-right"></span>SEO Optimation</li>
          <li class="uk-margin-small"><span uk-icon="icon:  triangle-right"></span>Multi User Account</li>
          <li class="uk-margin-small"><span uk-icon="icon:  triangle-right"></span>Multi Email Account</li>
          <li class="uk-margin-small"><span uk-icon="icon:  triangle-right"></span>Free Training</li>
          <li class="uk-margin-small"><span uk-icon="icon:  triangle-right"></span>Support Premium</li>
          <li class="uk-margin-small"><span uk-icon="icon:  triangle-right"></span>Renewal hosting + domain <br>
            <b class="uk-margin-medium-left">(IDR 2.500.000 / year)</b></li>
       </ul>
       <hr>
       <a href="http://wa.me/{{$wa}}?text=kak pesan website yang Exclusive class bisa kak?" target="_blank"   class="uk-button uk-button-default">Order now</a>
     </div>
   </div>

 </div>
</section>

<div class="uk-width-auto@m uk-width-1-1 uk-padding uk-text-center uk-flex uk-flex-column uk-margin-large-top">
  <h3 class="uk-text-bold uk-uppercase ">Do you want create a unique website ? </h3>
  <p class="uk-align-center  uk-margin-remove-vertical" style="max-width:600px">If you don't want to use laxavel template, and you wanna have a unique website by customize based on your request. <b class="x-color-theme-text">Call Us</b>  We sure can do it for you. </b> </p>
  <a href="http://wa.me/{{$wa}}" title="Order Unique Website" class="uk-button uk-button-default uk-margin-medium-top uk-align-center  " style="width:210px;"> Whatsapp Us </a>

</div>

<div class="uk-padding" style="background: #F8F9FA">
  <div class="uk-container">
    <div class=" uk-grid uk-grid-small uk-margin-medium-top" >
            
      <div class="uk-width-expand@m uk-width-1-1">
        <img data-src="{{asset('storage/uploads/page/sample_website/standart1.png')}}" alt="jasa pembuatan website" srcset="" uk-img class="uk-box-shadow-small uk-border-rounded">
        </div>
        
        <div class="uk-width-auto@m uk-width-1-1 uk-padding uk-text-center uk-flex uk-flex-column uk-margin-large-top">
          <h3 class="uk-text-bold uk-uppercase ">Standart Theme</h3>
          <p class="uk-align-center  uk-margin-remove-vertical" style="max-width:400px">If you first time using website, we recommended for choose this theme, after you can handle it you should to upgrade it to professional way. </b> </p>
          <a href="http://furniture.xitfoundation.com" target="_blank" title="Sample Standart Theme" class="uk-button uk-button-default uk-margin-medium-top uk-align-center  " style="max-width:450px;"> Demo </a>
        </div>
        
    </div>

  </div>
 
</div>

  <section id="template" class="uk-text-center uk-container">

    <div>
      <h2 class="uk-text-bold uk-text-capitalize uk-margin-large-top">Premium Theme</h2>
      <p class="uk-align-center" style="max-width:550px">A lot stunning theme of laxavel ready to use, <br> Choose and get website your pride of.
      </p>
    </div>
   
    <div>
     
      <div class="uk-padding-remove-vertical">
       
        <ul id="x-grid" class="uk-flex uk-align-center  uk-grid uk-grid-small  uk-padding-remove uk-flex-center uk-grid-match uk-child-width-1-4@m uk-child-width-1-2" uk-grid>
          <div>
            <li class="uk-card uk-card-hover uk-card-default x-cursor uk-border-rounded uk-overflow-hidden uk-position-relative">
              <a href="https://woodmart.xtemos.com" target="_blank">
                <img data-src="{{asset('storage/uploads/page/sample_website/woodmart/1.png')}}" uk-img alt="" srcset="">
              </a>
              <div class="uk-padding-small uk-padding-remove-vertical uk-position-bottom x-white">
                <a href="http://wa.me/{{$wa}}?text=Kak, pesan website kayak ini dong kak https://woodmart.xtemos.com" target="_blank" title="Sample Premium Theme" class="x-font-10 uk-button uk-button-default uk-margin-medium-top uk-align-center " style="max-width:450px;padding:0px 10px !important"> Order Now</a>
              </div>
            </li>
          </div>
          <div>
            <li class="uk-card uk-card-hover uk-card-default x-cursor uk-border-rounded uk-overflow-hidden uk-position-relative">
              <a href="https://woodmart.xtemos.com/demo-sweets-bakery/demo/sweets-bakery/" target="_blank">
                <img data-src="{{asset('storage/uploads/page/sample_website/woodmart/2.png')}}" uk-img alt="" srcset="">
              </a>
               <div class="uk-padding-small uk-padding-remove-vertical uk-position-bottom x-white">
                <a href="http://wa.me/{{$wa}}?text=Kak, pesan website kayak ini dong kak https://woodmart.xtemos.com/demo-sweets-bakery/demo/sweets-bakery/" target="_blank" title="Sample Premium Theme" class="x-font-10 uk-button uk-button-default uk-margin-medium-top uk-align-center " style="max-width:450px;padding:0px 10px !important"> Order Now</a>
              </div>
            </li>
          </div>
          <div>
            <li class="uk-card uk-card-hover uk-card-default x-cursor uk-border-rounded uk-overflow-hidden uk-position-relative">
              <a href="https://woodmart.xtemos.com/demo-decor/demo/decor/" target="_blank">
                <img data-src="{{asset('storage/uploads/page/sample_website/woodmart/3.png')}}" uk-img alt="" srcset="">
              </a>
               <div class="uk-padding-small uk-padding-remove-vertical uk-position-bottom x-white">
                <a href="http://wa.me/{{$wa}}?text=Kak, pesan website kayak ini dong kak https://woodmart.xtemos.com/demo-decor/demo/decor/" target="_blank" title="Sample Premium Theme" class="x-font-10 uk-button uk-button-default uk-margin-medium-top uk-align-center " style="max-width:450px;padding:0px 10px !important"> Order Now</a>
              </div>
            </li>
          </div>
          <div>
            <li class="uk-card uk-card-hover uk-card-default x-cursor uk-border-rounded uk-overflow-hidden uk-position-relative">
              <a href="https://woodmart.xtemos.com/demo-retail/demo/retail/" target="_blank">
                <img data-src="{{asset('storage/uploads/page/sample_website/woodmart/4.png')}}" uk-img alt="" srcset="">
              </a>
               <div class="uk-padding-small uk-padding-remove-vertical uk-position-bottom x-white">
                <a href="http://wa.me/{{$wa}}?text=Kak, pesan website kayak ini dong kak https://woodmart.xtemos.com/demo-retail/demo/retail/" target="_blank" title="Sample Premium Theme" class="x-font-10 uk-button uk-button-default uk-margin-medium-top uk-align-center " style="max-width:450px;padding:0px 10px !important"> Order Now</a>
              </div>
            </li>
          </div>
          <div>
            <li class="uk-card uk-card-hover uk-card-default x-cursor uk-border-rounded uk-overflow-hidden uk-position-relative">
              <a href="https://woodmart.xtemos.com/demo-marketplace/demo/marketplace/" target="_blank">
                <img data-src="{{asset('storage/uploads/page/sample_website/woodmart/5.png')}}" uk-img alt="" srcset="">
              </a>
               <div class="uk-padding-small uk-padding-remove-vertical uk-position-bottom x-white">
                <a href="http://wa.me/{{$wa}}?text=Kak, pesan website kayak ini dong kak https://woodmart.xtemos.com/demo-marketplace/demo/marketplace/" target="_blank" title="Sample Premium Theme" class="x-font-10 uk-button uk-button-default uk-margin-medium-top uk-align-center " style="max-width:450px;padding:0px 10px !important"> Order Now</a>
              </div>
            </li>
          </div>
          <div>
            <li class="uk-card uk-card-hover uk-card-default x-cursor uk-border-rounded uk-overflow-hidden uk-position-relative">
              <a href="https://woodmart.xtemos.com/demo-electronics/demo/electronics/" target="_blank">
                <img data-src="{{asset('storage/uploads/page/sample_website/woodmart/6.png')}}" uk-img alt="" srcset="">
              </a>
               <div class="uk-padding-small uk-padding-remove-vertical uk-position-bottom x-white">
                <a href="http://wa.me/{{$wa}}?text=Kak, pesan website kayak ini dong kak https://woodmart.xtemos.com/demo-electronics/demo/electronics/" target="_blank" title="Sample Premium Theme" class="x-font-10 uk-button uk-button-default uk-margin-medium-top uk-align-center " style="max-width:450px;padding:0px 10px !important"> Order Now</a>
              </div>
            </li>
          </div>
          <div>
            <li class="uk-card uk-card-hover uk-card-default x-cursor uk-border-rounded uk-overflow-hidden uk-position-relative">
              <a href="https://woodmart.xtemos.com/demo-fashion-colored/demo/fashion-colored/" target="_blank">
                <img data-src="{{asset('storage/uploads/page/sample_website/woodmart/7.png')}}" uk-img alt="" srcset="">
              </a>
               <div class="uk-padding-small uk-padding-remove-vertical uk-position-bottom x-white">
                <a href="http://wa.me/{{$wa}}?text=Kak, pesan website kayak ini dong kak https://woodmart.xtemos.com/demo-fashion-colored/demo/fashion-colored/" target="_blank" title="Sample Premium Theme" class="x-font-10 uk-button uk-button-default uk-margin-medium-top uk-align-center " style="max-width:450px;padding:0px 10px !important"> Order Now</a>
              </div>
            </li>
          </div>
          <div>
            <li class="uk-card uk-card-hover uk-card-default x-cursor uk-border-rounded uk-overflow-hidden uk-position-relative">
              <a href="https://woodmart.xtemos.com/demo-fashion-minimalism/demo/fashion-minimalism/" target="_blank">
                <img data-src="{{asset('storage/uploads/page/sample_website/woodmart/8.png')}}" uk-img alt="" srcset="">
              </a>
               <div class="uk-padding-small uk-padding-remove-vertical uk-position-bottom x-white">
                <a href="http://wa.me/{{$wa}}?text=Kak, pesan website kayak ini dong kak https://woodmart.xtemos.com/demo-fashion-minimalism/demo/fashion-minimalism/" target="_blank" title="Sample Premium Theme" class="x-font-10 uk-button uk-button-default uk-margin-medium-top uk-align-center " style="max-width:450px;padding:0px 10px !important"> Order Now</a>
              </div>
            </li>
          </div>
          <div>
            <li class="uk-card uk-card-hover uk-card-default x-cursor uk-border-rounded uk-overflow-hidden uk-position-relative">
              <a href="https://woodmart.xtemos.com/demo-minimalism/demo/minimalism/" target="_blank">
                <img data-src="{{asset('storage/uploads/page/sample_website/woodmart/9.png')}}" uk-img alt="" srcset="">
              </a>
               <div class="uk-padding-small uk-padding-remove-vertical uk-position-bottom x-white">
                <a href="http://wa.me/{{$wa}}?text=Kak, pesan website kayak ini dong kak https://woodmart.xtemos.com/demo-minimalism/demo/minimalism/" target="_blank" title="Sample Premium Theme" class="x-font-10 uk-button uk-button-default uk-margin-medium-top uk-align-center " style="max-width:450px;padding:0px 10px !important"> Order Now</a>
              </div>
            </li>
          </div>
          <div>
            <li class="uk-card uk-card-hover uk-card-default x-cursor uk-border-rounded uk-overflow-hidden uk-position-relative">
              <a href="https://woodmart.xtemos.com/layout-lookbook/?opt=layout_lookbook" target="_blank">
                <img data-src="{{asset('storage/uploads/page/sample_website/woodmart/10.png')}}" uk-img alt="" srcset="">
              </a>
               <div class="uk-padding-small uk-padding-remove-vertical uk-position-bottom x-white">
                <a href="http://wa.me/{{$wa}}?text=Kak, pesan website kayak ini dong kak https://woodmart.xtemos.com/layout-lookbook/?opt=layout_lookbook" target="_blank" title="Sample Premium Theme" class="x-font-10 uk-button uk-button-default uk-margin-medium-top uk-align-center " style="max-width:450px;padding:0px 10px !important"> Order Now</a>
              </div>
            </li>
          </div>
          <div>
            <li class="uk-card uk-card-hover uk-card-default x-cursor uk-border-rounded uk-overflow-hidden uk-position-relative">
              <a href="https://woodmart.xtemos.com/infinite-scrolling/?opt=layout_infinite" target="_blank">
                <img data-src="{{asset('storage/uploads/page/sample_website/woodmart/11.png')}}" uk-img alt="" srcset="">
              </a>
               <div class="uk-padding-small uk-padding-remove-vertical uk-position-bottom x-white">
                <a href="http://wa.me/{{$wa}}?text=Kak, pesan website kayak ini dong kak https://woodmart.xtemos.com/infinite-scrolling/?opt=layout_infinite" target="_blank" title="Sample Premium Theme" class="x-font-10 uk-button uk-button-default uk-margin-medium-top uk-align-center " style="max-width:450px;padding:0px 10px !important"> Order Now</a>
              </div>
            </li>
          </div>
          <div>
            <li class="uk-card uk-card-hover uk-card-default x-cursor uk-border-rounded uk-overflow-hidden uk-position-relative">
              <a href="https://woodmart.xtemos.com/demo-watches/demo/watch/" target="_blank">
                <img data-src="{{asset('storage/uploads/page/sample_website/woodmart/12.png')}}" uk-img alt="" srcset="">
              </a>
               <div class="uk-padding-small uk-padding-remove-vertical uk-position-bottom x-white">
                <a href="http://wa.me/{{$wa}}?text=Kak, pesan website kayak ini dong kak https://woodmart.xtemos.com/demo-watches/demo/watch/" target="_blank" title="Sample Premium Theme" class="x-font-10 uk-button uk-button-default uk-margin-medium-top uk-align-center " style="max-width:450px;padding:0px 10px !important"> Order Now</a>
              </div>
            </li>
          </div>
        </ul>
  
  
      </div>
    </div>

  </section>

  <hr class="uk-container">
    
  <div class="uk-text-center uk-margin-large-top">
    <h2 id="clients" class="uk-text-bold uk-text-capitalize">Our Website Clients</h2>
    <p class="uk-align-center" style="max-width:370px">You can check some our clients of website on below.
    </p>
  </div>
  <div class="uk-container uk-padding ">

    <ul class="uk-child-width-1-5@m uk-padding uk-child-width-1-2 uk-flex-center uk-grid uk-flex uk-flex-middle">
      <a href="http://louiserococo.com" target="_blank" class="uk-padding uk-card uk-card-hover x-cursor">
          <img data-src="{{asset('storage/uploads/page/clients/louise.png')}}" alt="" uk-img>
       
      </a>
      <a class="uk-padding uk-card uk-card-hover x-cursor" href="http://fiscofurniture.com" target="_blank">
      
          <img data-src="{{asset('storage/uploads/page/clients/fisco.png')}}" alt="" uk-img>
        
      </a>
      <a class="uk-padding uk-card uk-card-hover x-cursor" href="http://elsartsindo.com" target="_blank">
          <img data-src="{{asset('storage/uploads/page/clients/els.png')}}" alt="" uk-img>
      </a>
      <a class="uk-padding uk-card uk-card-hover x-cursor" href="http://ailajatihiasfurniturejepara.com" target="_blank">
          <img data-src="{{asset('storage/uploads/page/clients/aila.png')}}" alt="" uk-img>
      </a>
      <a class="uk-padding uk-card uk-card-hover x-cursor" href="http://jelajahsamudera.com" target="_blank">
          <img data-src="{{asset('storage/uploads/page/clients/jelajah.jpg')}}" alt="" uk-img>
        
      </a>
      <a class="uk-padding uk-card uk-card-hover x-cursor" href="http://keckendal.kendalkab.go.id/" target="_blank" >
        <img data-src="{{asset('storage/uploads/page/clients/kendal.png')}}" alt="" uk-img>
        
      </a>
      
      <a class="uk-padding uk-card uk-card-hover x-cursor" href="http://defurnitureindonesia.com" target="_blank">
          <img data-src="{{asset('storage/uploads/page/clients/defurniture.png')}}" alt="" uk-img>
        
      </a>
      <a class="uk-padding uk-card uk-card-hover x-cursor" href="http://nilamsari.com" target="_blank">
          <img data-src="{{asset('storage/uploads/page/clients/nilamsari.png')}}" alt="" uk-img>
        
      </a>
      <a class="uk-padding uk-card uk-card-hover x-cursor" href="http://sugarpastry.id" target="_blank">
          <img data-src="{{asset('storage/uploads/page/clients/sugarpastry.jpg')}}" alt="" uk-img>
        
      </a>
      <a class="uk-padding uk-card uk-card-hover x-cursor" href="http://jualveneerkayu.com" target="_blank">
          <img data-src="{{asset('storage/uploads/page/clients/jualveneer.jpg')}}" alt="" uk-img>
        
      </a>
   
     
    
      
    </ul>
    
  </div>
  <hr>

  <section class="uk-container uk-margin-large-top">
     
    <blockquote cite="#" class="uk-text-center uk-margin-xlarge uk-width-1-1">
      <p class="uk-margin-small-bottom">"That just little piece of our client, we can't put all our client in here."</p>
    <footer>more information you can click this link <cite><a href="http://wa.me/{{$wa}}" class="x-color-theme-text uk-text-bold">Chat Us</a></cite></footer>
    </blockquote>

  </section>
@endsection

<script>

        
      
  document.addEventListener('DOMContentLoaded',()=>{
    var categories = JSON.parse('{!! json_encode($category) !!}');
    $('#sort-asc').click(function (e) { 
      e.preventDefault();
      $('#sort').val('asc');
      $('#paginate').val($('#slc-paginate').val());
      $('#form-search').submit();
    });
    $('#sort-desc').click(function (e) { 
      e.preventDefault();
      $('#sort').val('desc');
      $('#paginate').val($('#slc-paginate').val());
      $('#form-search').submit();
    });
   

    initCategory();
    $('.content-img_thumb').click(function (e) { 
      e.preventDefault();
      var parent = this.parentNode.parentNode ;

      var imageThumb = parent.querySelector('.content-img_thumb');
      var imagePath = parent.querySelector('.content-image_path').innerHTML.split('|');

      var dataSrc  = $(imageThumb).attr('data-src');
      var title  = parent.querySelector('.content-title').innerHTML;
      var price  = parent.querySelector('.content-price').innerHTML;
      var htmlThumb  = '';
      var htmlPath  = '';
      var i = 0 ;
      var ukActive = 0 ;
      imagePath.forEach(path => {
         dataSrc == `{{asset('storage/')}}/`+ path ? ukActive = i : '';
        
        
        htmlThumb += `<li class="uk-background-contain" style="background-image:url({{asset('storage/')}}/${path})" alt="" srcset="" uk-img></li>`
        htmlPath += `<li uk-slideshow-item="${i}"><a class="" href="#"><img data-src="{{asset('storage/')}}/${path}" alt="" srcset="" style="width:48px;height:48px;object-fit:cover" uk-img></a></li>`
        i++;
      });

      $('#img-thumb-preview').html(htmlThumb);
      $('#img-path-preview').html(htmlPath);
      console.log(ukActive);
      
      var shortDesription  = parent.querySelector('.content-short_description').innerHTML;
      $('#img-product-preview').attr('data-src', dataSrc);
      
      $('#title-preview').html(title);
      $('#price-preview').html(price);
      $('#short-description-preview').html(shortDesription);
      
      UIkit.modal('#modal-view').show();
      $(`li[uk-slideshow-item="${ukActive}]"`).addClass('uk-active');
    });

    function initCategory(){
      var strip = '';
      var html = '';
      var stripCount = 0;

      if (categories.length == 0) {
        $('#list-category').append('<div class="uk-text-center">Category not found.</div>');
      }

      categories.forEach(category => {
        char_count(category.id_parent , '|') > stripCount ? stripCount = char_count(category.id_parent , '|') : stripCount;
      });

      for (var i = 0; i <= stripCount; i++) {
        categories.forEach(category => {
          strip = '';
          html= '';
          var cekStripCount = char_count(category.id_parent , '|') ;
          var indexOf       = category.id_parent.indexOf('|');
        
          if (cekStripCount !== 0) {
            for (var x = 0; x < i; x++) {
              strip +='--';
            }
          }
         
          if (cekStripCount == i) {
            var parent =  indexOf !== -1 ? category.id_parent.substring(0,indexOf) : '0';
            if (parent !== "0") {
              html +=`<div id="category-${category.id}"  class="uk-margin-small category"> 
                
                <span class="uk-margin-medium-left">${strip} </span><span class="category-name x-cursor link-category x-font-14" data-id="${category.id}">${category.name}</span></div>`;
              if ($('#category-'+parent).length) {
                  $('#category-'+parent).append(html);
              }else{
                $('#list-category').append(html);
                
              }
            }else{
              html +=`<div id="category-${category.id}" class="uk-margin-small category">
                
                ${strip} <span class="uk-text-bold x-cursor link-category x-font-14" data-id="${category.id}"> <span class="uk-icon" uk-icon="icon: triangle-right"></span> ${category.name}</span>   </div>`;
              $('#list-category').append(html);
            }
            return false;
          }
          
        });   
             
      }
      $('.btn-hapus').click(function (e) { 
        e.preventDefault();
        e.stopPropagation();
        var id = e.currentTarget.parentNode.id.replace(/category-/gi, '');
        $('#form-delete').attr('action', "{{url('xpanel/category-article/')}}"+'/'+id);
        UIkit.modal('#modal-delete').show();
      });
      $('.btn-edit').click(function (e) { 
        e.preventDefault();
        e.stopPropagation();
        var id =  e.currentTarget.parentNode.id.replace(/category-/gi , '');
        window.location.href = `{{url('xpanel/'.Request::segment(2).'/${id}/edit')}}`;
      });

        $('.link-category').click(function (e) { 
        e.preventDefault();
        $('#cek_category').val($(this).attr('data-id'));
        $('#form-search').submit();
      });
      
      
    }
    
    function char_count(str, letter) {
      var letter_Count = 0;
      for (var position = 0; position < str.length; position++) 
      {
          if (str.charAt(position) == letter) 
            {
            letter_Count += 1;
            }
        }
        return letter_Count;
    }

  });
</script>