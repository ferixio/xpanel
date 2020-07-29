@extends('layouts.public')
@section('content')
    <section class="uk-container uk-padding uk-text-center" style="min-height: 400px">
      <img class="uk-align-center uk-responsive-width uk-padding" data-src="{{asset('storage/uploads/page/chef.jpg')}}" alt="" srcset="" uk-img style="max-height: 450px;">
      <h4 class="uk-text-bold uk-margin-large-bottom uk-margin-remove">Terima kasih, pesanan anda telah kami terima.</h4>
      <p style="max-width: 400px" class="uk-align-center">Silahkan cek email anda atau masuk ke halaman member kami dengan mengklik tombol dibawah ini untuk melihat riwayat pesanan. </p>

    <button class="uk-button uk-button-default uk-margin-large-bottom" onclick="window.location.href=`{{url('masuk')}}`">ke member area</button>
      
    </section>
@endsection