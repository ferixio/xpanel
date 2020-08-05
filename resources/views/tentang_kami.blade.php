@extends('layouts.public')
@section('content')
  <section class="uk-text-center uk-height-small uk-background-cover uk-position-relative" data-src="{{asset('storage/uploads/page/bg_produk.jpg')}}" alt="" srcset="" uk-img  >
    <div class=" uk-position-cover ">

      <h3 class="uk-position-center uk-text-bold x-font-32 x-white-text uk-text-uppercase" style="text-shadow: 2px 4px 5px #4e4e4e;">Tentang Kami</h3>
    </div>
  </section>
  <section class="uk-container uk-margin-large uk-padding  ">
    <div class="uk-text-center">
      <img class="uk-border-rounded uk-box-shadow-small" data-src="{{asset('storage/uploads/page/logo.png')}}" alt="" srcset="" uk-img style="max-height: 200px">
      
      <h3 class="uk-text-bold uk-text-capitalize">Selamat datang di <br> {{$x_setting['ST-0001']['isi']}}</h3>
    </div>
   
    <hr class="uk-divider-icon">
  </section>
@endsection