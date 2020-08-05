<section  class="uk-container uk-height-auto uk-text-left uk-margin-large-top "  style="min-height: 500px">
  <div class="uk-child-width-1-4@m uk-child-width-1-2 uk-padding" uk-grid>
    <div class=" uk-flex uk-flex-center">
      <img class="uk-border-rounded" alt="{{$x_setting['ST-0001']['isi']}}" title="{{$x_setting['ST-0001']['isi']}}" data-src="{{asset('storage/uploads/page/logo.png')}}" alt="" srcset="" uk-img style="max-height: 200px">
      
    </div>
    <div >
      <p class="uk-text-bold  x-font-16">Links</p>
      <ul class="uk-padding-remove-horizontal">
        <li><a title="Produk kami" href="{{url('product')}}" class="uk-button-text  x-cursor x-font-14">Produk Kami</a></li>
        <li><a title="Artikle" href="{{url('article')}}" class="uk-button-text  x-cursor x-font-14">Artikel</a></li>
        <li><a title="Tentang Kami" href="{{url('tentang-kami')}}" class="uk-button-text  x-cursor x-font-14">Tentang Kami</a></li>
        <li><a title="Kontak Kami" href="{{url('kontak-kami')}}" class="uk-button-text  x-cursor x-font-14">Kontak Kami</a></li>
      </ul>
    </div>
    <div class="uk-flex uk-flex-column uk-flex-left uk-flex-last@m uk-text-center uk-text-left@m">
      <h1 class="x-font-16 uk-text-bold  uk-text-capitalize uk-margin-remove uk-padding-remove uk-text-capitalize">"{{$x_setting['ST-0001']['isi']}}"</h1>

      <p class="x-font-14 uk-text-capitalize">
        
        Office : <br> {{$x_setting['ST-0002']['isi']}} <br>
        Phone : {{$x_setting['ST-0004']['isi']}}
      </p>
      <ul class="uk-flex uk-flex-left@m uk-flex-center uk-padding-remove">
        <li><a title="fb" href="{{!is_null($social_media) ? $social_media->fb : ''}}"  target="_blank"  class="uk-icon-button" uk-icon="facebook"></a></li>
        <li><a title="ig" href="instagram://user?username={{!is_null($social_media) ? $social_media->ig : ''}}"  target="_blank"  class="uk-icon-button" uk-icon="instagram"></a></li>
        <li><a title="wa" href="https://wa.me/{{$wa}}" target="_blank" class="uk-icon-button" uk-icon="whatsapp"></a></li>
      </ul>
    </div>
    <div class=" uk-text-left@m uk-text-left">
      <p class="uk-text-bold  x-font-16">Lain-lain</p>
      <ul class="uk-padding-remove-horizontal">
        <li><a title="toc" href="terms-conditions" class="uk-button-text  x-cursor x-font-14">Syarat dan Ketentuan</a></li>
        <li><a title="how to shop" href="how-to-shop" class="uk-button-text  x-cursor x-font-14">Cara Belanja Online</a></li>
      </ul>
    </div>
    
  </div>
  
</section>
<div class="uk-text-center x-white-text  x-font-12 uk-padding-small x-color-accent uk-width-1-1">
  <span class="uk-text-bold uk-text-capitalize">{{$x_setting['ST-0001']['isi']}}</span> &copy;   {{date_create()->format('Y')}}. Supported by <h3 class="uk-flex-inline x-font-12 uk-margin-remove"><a title="xit foundation" href="http://www.xitfoundation.com" class="uk-text-bold " target="_blank">XIT foundation</a></h3>
</div>