@extends('layouts.public')
@section('content')
  <section class="uk-text-center uk-height-small uk-background-cover uk-position-relative" data-src="{{asset('storage/uploads/page/bg_produk.jpg')}}" alt="" srcset="" uk-img  >
    <div class=" uk-position-cover ">

      <h3 class="uk-position-center uk-text-bold x-font-32 x-white-text uk-text-uppercase" style="text-shadow: 2px 4px 5px #4e4e4e;">Kontak Kami</h3>
    </div>
  </section>
  <section style="margin-bottom:-70px !important">
    <div class="uk-container uk-padding-large uk-text-center">
      <div class="uk-text-center">
        <img class="uk-border-rounded uk-box-shadow-small" data-src="{{$x_setting['ST-0000']['isi']}}" alt="" srcset="" uk-img style="max-height: 200px">
        
        <h3 class="uk-text-bold uk-text-capitalize">{{$x_setting['ST-0001']['isi']}}</h3>
      </div>
      <p class="x-font-14 uk-text-capitalize">
        
        Office : <br> {{$x_setting['ST-0002']['isi']}} <br>
        Phone : {{$x_setting['ST-0004']['isi']}}
      </p>
      <ul class="uk-flex uk-flex-center uk-padding-remove">
        <li><a href="#" class="uk-icon-button" uk-icon="facebook"></a></li>
        <li><a href="#" class="uk-icon-button" uk-icon="instagram"></a></li>
        <li><a href="https://wa.me/{{$wa}}" target="_blank" class="uk-icon-button" uk-icon="whatsapp"></a></li>
      </ul>
    </div>
    <section id="maps">
      {!! $x_setting['ST-0009']['isi'] !!}
    </section>
  </section>
  <script>
    document.addEventListener('DOMContentLoaded',()=>{
      $('#maps iframe').css('width', '100%');
      $('#maps iframe').css('height', '700px');
    });
  </script>
@endsection