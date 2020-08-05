@extends('layouts.public')
@section('content')
  <section class="uk-text-center uk-height-small uk-background-cover uk-position-relative" data-src="{{asset('storage/uploads/page/bg_produk.jpg')}}" alt="" srcset="" uk-img  >
    <div class=" uk-position-cover ">

      <h3 class="uk-position-center uk-text-bold x-font-32 x-white-text uk-text-uppercase" style="text-shadow: 2px 4px 5px #4e4e4e;">How to shop?</h3>
    </div>
  </section>
  <section class="uk-container uk-margin-large uk-padding uk-align-center uk-box-shadow-small" style="max-width:600px !important">
    <h5 class=" uk-text-bold x-font-18">Cara Berbelanja di website <i>"{{$x_setting['ST-0001']['isi']}}"</i> </h5> 
    <div class="uk-margin-medium-top uk-margin-small-bottom uk-text-bold">Berikut langkah-langkah berbelanja di website ini : </div>
      <p class="uk-margin-large-bottom">
        1. Pilih produk yang anda suka di halaman produk / di halaman awal.  <br><br>
        2. Masukan ke keranjang belanja anda terlebih dahulu sebelum melakukan pemesanan. <br><br>
        3. Setelah dirasa barang yang ingin dipesan sudah sesuai, klik pesan sekarang di bagian keranjang belanja. <br><br>
        4. Lengkapi informasi data pribadi anda sesuai ketentuan yang tertampil. dan klik proses sekarang dihalaman checkout. <br><br>
        5. Anda akan menerima invoice pemesanan ke email anda.  <br><br>
        6. Jika anda pertama kali berbelanja di <i>{{$x_setting['ST-0001']['isi']}}</i>, anda akan menerima email registrasi yang berisi username dan password untuk masuk ke system kami. <br><br>
        7. Bayarkan pesanan anda sesuai total biaya yang tertera di invoice pemesanan. <br><br>
        8. Konfirmasi pembayaran anda melalui system kami atau melalui whatsapp, admin kami akan segera mengkonfirmasi atas pesanan dan pembayaran yang anda lakukan. <br><br>
        9. Admin kami akan segera memproses dan mengirim pesanan anda sesegera mungkin, dan anda akan mendapatkan update informasi tentang pesanan anda secara berkala. <br><br>
        10. Jika pesanan sudah diterima dan tidak ada komplain, maka kami akan mengubah pesanan anda menjadi selesai di system kami.
      </p> 

      <blockquote cite="#" class="uk-text-center">
        <p class="uk-margin-small-bottom">"Happy shopping and make your life easer."</p>
      <footer>Someone famous in <cite><a href="{{url('/')}}" class="x-color-theme-text uk-text-bold">{{$x_setting['ST-0001']['isi']}}</a></cite></footer>
      </blockquote>


    <div class="x-space-100"></div>
    
  </section>
@endsection