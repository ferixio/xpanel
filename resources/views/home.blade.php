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

    <x-public.section.slideshow1 />
    <x-public.section.template1 />
   
    <section class="uk-container uk-padding uk-margin-xlarge-top">
      <div class="uk-text-center">
        <h2 class="uk-text-bold">New Variants</h2>
        <p>Sebuah kreasi dengan citarasa dan komposisi yang presisi,
          <br> Tengok berbagai jenis variant baru dari <b>Sugar Pastry Brownies</b>.
        </p>
      </div>
      
      <div class="uk-padding uk-position-relative" uk-slider="autoplay: true;pause-on-hover:false;autoplay-interval:4000">
        <div class="uk-slider-container uk-padding">
          <ul class="uk-slider-items uk-child-width-1-3@m uk-grid">
            <x-public.section.grid1 :data="$data" />
          </ul>
        </div>

        
        {{-- <ul class="uk-slider-nav uk-dotnav uk-position-bottom-center uk-margin"></ul> --}}

        <div class="uk-hidden@s uk-light">
          <a class="uk-position-center-left uk-position-small" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
          <a class="uk-position-center-right uk-position-small" href="#" uk-slidenav-next uk-slider-item="next"></a>
        </div>

        <div class="uk-visible@s">
            <a class="uk-position-center-left-out uk-position-small" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
            <a class="uk-position-center-right-out uk-position-small" href="#" uk-slidenav-next uk-slider-item="next"></a>
        </div>
      </div>

      <div id="x-grid" class="uk-flex   uk-grid-small uk-padding-small uk-flex-center uk-grid-match uk-child-width-1-4@m uk-child-width-1-2" uk-grid>
          <x-public.section.grid1 :data="$data" />
      </div>
           

      <button class="uk-button uk-button-default uk-align-center" onclick="window.location.href=`{{url('product')}}`">Lihat Semua Produk</button>
    </section>

    <section class="uk-text-center uk-margin-large-top uk-padding uk-height-medium uk-background-top-left uk-background-cover uk-position-relative" data-src="{{asset('storage/uploads/page/bg1.jpg')}}" alt="" srcset="" uk-img  >
      <h3 class="uk-position-center uk-text-bold x-font-64 x-white-text" style="text-shadow: 2px 3px 5px #3a3a3a">Keep in touch with us.</h3>
    </section>
    
    <section class=" uk-padding uk-container">
      <div class="uk-text-center">
        <h2 class="uk-text-bold">Promo and Sweet Story</h2>
        <p>keep in touch with us, jangan lewatkan promo dan cerita manis dari <span class="uk-text-bold">Sugar Pastry Brownies</span>.
          <br> karena yang <span class="uk-text-bold">manis</span> selalu bisa membuat kita tersenyum.
        </p>
      </div>
      <x-public.section.slider2 />

      

      <img class="uk-align-center uk-responsive-width uk-padding" data-src="{{asset('storage/uploads/page/chef.jpg')}}" alt="" srcset="" uk-img style="max-height: 450px;">
      <blockquote cite="#" class="uk-text-center">
        <p class="uk-margin-small-bottom">"A piece of brownies a day keeps your day be sweet until you sleep."</p>
        <footer>Someone famous in <cite><a href="#" class="x-color-theme-text uk-text-bold">Sugar Pastry Brownies</a></cite></footer>
      </blockquote>
      <div class="uk-margin-medium">
        <form action="#" method="post" class="uk-flex uk-flex-center uk-child-width-auto uk-flex-middle uk-flex-column">
          <input type="email" class="uk-input uk-margin-small-right" placeholder=" Enter your email to subscribe every sweet story. " style="min-width:320px">
          <button type="submit" class="uk-button uk-button-default">Subscribe</button>
        </form>
      </div>

    
      
    </section>

@endsection