@extends('layouts.public')
@section('content')
  <section class="uk-text-center uk-height-small uk-background-cover uk-position-relative" data-src="{{asset('storage/uploads/page/bg_produk.jpg')}}" alt="" srcset="" uk-img  >
    <div class=" uk-position-cover ">

      <h3 class="uk-position-center uk-text-bold x-font-32 x-white-text uk-text-uppercase" style="text-shadow: 2px 4px 5px #4e4e4e;">Tentang Kami</h3>
    </div>
  </section>
  <section class="uk-container uk-margin-large uk-padding  ">
    <div class="uk-text-center">
      <img class="uk-border-rounded uk-box-shadow-small" data-src="{{$x_setting['ST-0000']['isi']}}" alt="" srcset="" uk-img style="max-height: 200px">
      
      <h3 class="uk-text-bold uk-text-capitalize">Selamat datang di <br> {{$x_setting['ST-0001']['isi']}}</h3>
    </div>
    <p  style="white-space: pre-wrap" class="uk-column-1-2@m uk-margin-medium-top uk-text-left@m  uk-text-center">Sugar Pastry Brownies, dari Bandung untuk Nusantara Kota Bandung dikenal sebagai kota wisata. Meski tak memiliki objek wisata alam, namun kota berjuluk Paris Van Java ini tetap memiliki daya tarik bagi para pelancong. Salah satu daya tarik tersebut adalah wisata kulinernya. Wisatawan yang bertandang ke kota kembang ini tentu tak akan melewatkan membeli oleh-oleh makanan. Salah satu buah tangan yang paling favorit ditenteng wisatawan saat pulang adalah produk Sugar Pastry Brownies.

Oleh-oleh yang satu ini memang sudah menjadi ikon Kota Bandung. Jika Anda menyebut brownies, maka akan langsung ingat dengan Sugar Pastry Brownies. Karena itulah slogan ‘brownies ya Amanda’ sudah sangat melekat di hati masyarakat. Sugar Pastry Brownies yang bertempat di area pati, awalnya hanya usaha home industry. Namun berkat keuletan dan keseriusan pemilik Sugar Pastry Brownies, makanan dari Bandung ini akhirnya menjadi selera Nusantara.

Awalnya, Kami hanya memproduksi satu varian yaitu brownies original. Namun resep keluarga yang kemudian dilempar ke pasaran ini mendapat respon yang sangat positif dari masyarakat. Respon masyarakat yang sangat luar biasa ini kami apresiasi. Kami terus mengembangkan kreasinya dengan melakukan inovasi dengan dasar utama brownies. Kemudian lahirlah varian baru seperti cheese cream perpaduan krim keju pilihan dengan brownies original. Selain itu ada sarikaya pandan, blueberry, choco marble, pink marble, green marble, tiramisu, dan varian lainnya.

Tak hanya brownies yang Kami produksi. Beragam pastry dengan cita rasa yang bisa memanjakan lidah Anda pun tersedia. Produk unggulan Kami lainnya yaitu pisang bolen keju, pisang bolen nanas, cheese stick, sweet stick, cheese roll, dan aneka keripik pisang serta kentang. Produk makanan yang terjamin kualitas dan kehalalannya ini bisa Anda dapatkan di puluhan outlet kami yang ada di sejumlah kota besar di Jawa Barat, Jawa Tengah, Yogyakarta, Jawa Timur, Sumatra Utara, Sumatra Selatan, Sulawesi Selatan, dan Kalimantan Timur.

Di samping terus berinovasi dalam hal produk, demi memenuhi permintaan masyarakat, Kami berupaya menjangkau berbagai wilayah di nusantara dengan menambah outlet baru. Kami tengah mempersiapkan outlet-outlet baru di beberapa kota. Semoga kehadiran kami di lokasi-lokasi tersebut dapat diterima dengan baik.
    </p>
    <hr>
  </section>
@endsection