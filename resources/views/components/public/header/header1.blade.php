<section class="uk-container" >

  <div class="uk-flex-middle uk-flex" style="height:70px !important;">
    <div  class="uk-position-z-index">
      <a href="{{url('/')}}">
        <img  data-src="{{asset('storage/uploads/logo.png')}}" alt="" srcset="" uk-img style="max-height:100px;margin-top:50px">
      </a>
    </div>

    <div  class="uk-width-expand@m uk-visible@m">
      <ul class="uk-flex uk-padding-small uk-flex-row uk-grid-medium uk-flex-center" uk-grid>
        <x-public.menu />
      </ul>
    </div>


    <div class="uk-width-auto@m uk-text-center" style="margin-left:-10px !important;">
      
      <a uk-toggle="target: #canvas-cart"  class="uk-icon-button btn-cart" uk-icon="cart"  title="Daftar belanja" uk-tooltip ></a>
      <a uk-toggle="target: #canvas-wishlist" class="uk-icon-button btn-wishlist" uk-icon="heart"  title="Daftar wishlist" uk-tooltip ></a>
      <a uk-toggle="target: #canvas-login" class="uk-icon-button" uk-icon="user"  title="Akun" uk-tooltip ></a>
      
    </div>

    <span uk-icon="icon: menu;ratio:1.5" class="uk-hidden@m" uk-toggle="target: #canvas-menu" ></span>
    
  </div>

  <div id="canvas-menu" uk-offcanvas>
    <div class="uk-offcanvas-bar uk-box-shadow-small">
      <button class="uk-offcanvas-close" type="button" uk-close></button>
      <ul class="uk-flex uk-flex-column uk-flex-center">
        <x-public.menu />
      </ul>
    </div>
  </div>

  <div id="canvas-login"  uk-offcanvas="flip: true;">
    <div class="uk-dark uk-offcanvas-bar uk-box-shadow-small ">
      <button class="uk-offcanvas-close" type="button" uk-close></button>

      <form action="#" class="uk-margin-medium-top">
        <p class="x-font-14 uk-text-bold">Masuk</p>
        <input type="text" class="uk-input">
        <input type="text" class="uk-input">
      </form>
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
        <a href="{{url('checkout')}}" class="uk-button uk-button-default uk-width-1-1">Pesan sekarang</a>
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
 