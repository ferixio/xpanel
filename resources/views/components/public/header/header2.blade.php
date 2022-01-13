<style>
  li.x-hover-white:hover a{
    color:white !important;
  }
</style>
<section class="uk-padding-small uk-padding-remove-vertical" >

  <div class="uk-flex-middle uk-flex" style="height:70px !important;">

    <ul class="uk-flex x-font-10 uk-flex-center uk-position-fixed uk-position-bottom x-color-accent uk-hidden@m uk-grid-collapse uk-child-width-expand uk-margin-remove uk-text-center" uk-grid>
      <li>
        <a href="{{ url('/') }}" class="menu uk-padding-small uk-flex uk-flex-column uk-flex-middle">
          <span uk-icon="icon: home"></span>
          <p class="x-font-10 uk-margin-remove">Home</p>
        </a>
      </li>
      <li>
        <a href="https://website.xitfoundation.com/" class="menu uk-padding-small uk-flex uk-flex-column uk-flex-middle">
          <span uk-icon="icon: world"></span>
          <p class="x-font-10 uk-margin-remove">Website</p>
        </a>
      </li>
      <li>
        <a href="{{ url('seo') }}" class="menu uk-padding-small uk-flex uk-flex-column uk-flex-middle">
          <span uk-icon="icon: bolt"></span>
          <p class="x-font-10 uk-margin-remove">SEO</p>
        </a>
      </li>
      <li>
        <a href="{{ url('application') }}" class="menu uk-padding-small uk-flex uk-flex-column uk-flex-middle">
          <span uk-icon="icon: nut"></span>
          <p class="x-font-10 uk-margin-remove">Application</p>
        </a>
      </li>
      <li>
        <a href="{{ url('netboard') }}" class="menu uk-padding-small uk-flex uk-flex-column uk-flex-middle">
          <span uk-icon="icon: file-text"></span>
          <p class="x-font-10 uk-margin-remove">.NET board</p>
        </a>
      </li>
      {{-- <li>
        <a href="{{ url('design') }}" class="menu uk-padding-small uk-flex uk-flex-column uk-flex-middle">
          <span uk-icon="icon: image"></span>
          <p class="x-font-10 uk-margin-remove">Design</p>
        </a>
      </li>
      <li>
        <a href="{{ url('application') }}" class="menu uk-padding-small uk-flex uk-flex-column uk-flex-middle">
          <span uk-icon="icon: nut"></span>
          <p class="x-font-12 uk-margin-remove">Application</p>
        </a>
      </li>
      <li>
        <a href="{{ url('/') }}" class="menu uk-padding-small uk-flex uk-flex-column uk-flex-middle">
          <span uk-icon="icon: thumbnails"></span>
          <p class="x-font-12 uk-margin-remove">.NETboard</p>
        </a>
      </li> --}}
      
    
      
    </ul>

    <div  class="uk-width-expand uk-visible@m">
      <ul class="uk-flex uk-padding-small uk-flex-row uk-grid-medium uk-flex-center" uk-grid>
        <x-public.menu />
      </ul>
    </div>


    <div  class="uk-position-z-index uk-flex-first@m" >
      <a  title="{{$x_setting['ST-0001']['isi']}}" href="{{url('/')}}" >
        <img  data-src="{{asset('storage/uploads/page/logo_landscape.jpg')}}" title="{{$x_setting['ST-0001']['isi']}}" alt="{{$x_setting['ST-0001']['isi']}}" srcset="" uk-img style="max-height:70px;margin-top:5px">
      </a>
    </div>
    
   

    <div class="uk-width-auto@m uk-text-right" style="min-width:170px">
      
      <a href="{{$social_media->fb}}" target="_blank" class="uk-icon-button" uk-icon="facebook"  title="facebook" uk-tooltip ></a>
      <a href="{{$social_media->ig}}" target="_blank" class="uk-icon-button" uk-icon="instagram"  title="instagram" uk-tooltip ></a>
      <span class="uk-icon-button x-cursor" uk-icon="user"  title="Login" uk-tooltip></span>
      <ul uk-dropdown="pos: bottom-right;duration: 400;offset:200px" style="border-radius:5px; background:white;padding:10px 0;width:250px">
        @if (!Auth::check())
        <li  class="uk-padding-small x-hover-white"><a title=""  class="x-color-theme-text x-font-14" href="{{url('masuk')}}" rel="nofollow"> <span uk-icon="icon: sign-in"></span>  Masuk</a></li>
          @else
          <p class="x-font-14" style="margin:10px 0 5px 15px">Halo kak <b>{{Auth::user()->nama}}</b></p>
          <li class="uk-padding-small x-hover-white"><a title="history" class="x-color-theme-text  x-font-14" href="{{url('history-order')}}"> <span uk-icon="icon: file-text"></span> Riwayat Pesanan</a></li>
          <li  class="uk-padding-small x-hover-white"><a  title="setting" class="x-color-theme-text  x-font-14" href="{{url('pengaturan')}}"> <span uk-icon="icon: cog"></span> Pengaturan</a></li>
          <li  class="uk-padding-small x-hover-white"><a title="keluar" class="x-color-theme-text x-font-14" href="{{url('logout')}}"> <span uk-icon="icon: sign-out"></span> Keluar</a></li>
          
        @endif
      </ul>
      {{-- <a  href="{{url('/')}}" class="uk-icon-button" uk-icon="home"  title="Home" uk-tooltip ></a> --}}
     
      
    </div>

    
  </div>

 
  
  
  <div id="canvas-cart" uk-offcanvas="flip: true;">
    <div class="uk-offcanvas-bar uk-box-shadow-small" style="min-width: 350px;padding-right:10px !important;padding-left:20px !important;">
      <button class="uk-offcanvas-close" type="button" uk-close></button>
      <p class="x-font-14 uk-text-bold uk-text-uppercase">Keranjang Belanja</p>
      <div class="list-cart uk-flex uk-flex-column uk-overflow-auto" style="height: calc(100vh - 260px)"></div>
      <div class="uk-position-small uk-position-bottom x-white uk-padding-small">
        <hr>
        <p><span class="x-font-14">Total Belanja :</span> <br> <b>Rp.</b> <span class="uk-text-bold total-belanja"></span></p>
        <a title="pesan" href="{{url('checkout')}}" class="uk-button uk-button-default uk-width-1-1">Pesan sekarang</a>
      </div>

      
    </div>
  </div>
  
  <div id="canvas-wishlist" uk-offcanvas="flip: true;">
    <div class="uk-offcanvas-bar uk-box-shadow-small" style="min-width: 350px;padding-right:10px !important;padding-left:20px !important;">
      <button class="uk-offcanvas-close" type="button" uk-close></button>
      <p class="x-font-14 uk-text-bold uk-text-uppercase">Daftar produk yang disukai</p>
      <div class="list-wishlist uk-flex uk-flex-column uk-overflow-auto" style="height: calc(100vh - 150px)"></div>
      

      
    </div>
  </div>
  
</section>
 