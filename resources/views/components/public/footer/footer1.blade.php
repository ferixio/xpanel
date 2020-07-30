<section  class="uk-container uk-height-auto uk-text-left uk-margin-large-top "  style="min-height: 500px">
  <div class="uk-child-width-1-4@m uk-child-width-1-2 uk-padding" uk-grid>
    <div class=" uk-flex uk-flex-center">
      <img class="uk-border-rounded" data-src="{{$x_setting['ST-0000']['isi']}}" alt="" srcset="" uk-img style="max-height: 200px">
      
    </div>
    <div >
      <h4 class="uk-text-bold x-white-text">Links</h4>
      <ul class="uk-padding-remove-horizontal">
        <li><a href="{{url('product')}}" class="uk-button-text x-white-text x-cursor x-font-14">Catalog Product</a></li>
        <li><a href="{{url('article')}}" class="uk-button-text x-white-text x-cursor x-font-14">Sweet Story</a></li>
        <li><a href="{{url('tentang-kami')}}" class="uk-button-text x-white-text x-cursor x-font-14">About Us</a></li>
        <li><a href="{{url('kontak-kami')}}" class="uk-button-text x-white-text x-cursor x-font-14">Contact Us</a></li>
      </ul>
    </div>
    <div class="uk-flex uk-flex-column uk-flex-left uk-flex-last@m uk-text-center uk-text-left@m">
      <h5 class="uk-text-bold x-white-text uk-text-uppercase uk-margin-remove uk-padding-remove uk-text-capitalize">"{{$x_setting['ST-0001']['isi']}}"</h5>

      <p class="x-font-14 uk-text-capitalize">
        
        Office : <br> {{$x_setting['ST-0002']['isi']}} <br>
        Phone : {{$x_setting['ST-0004']['isi']}}
      </p>
      <ul class="uk-flex uk-flex-left@m uk-flex-center uk-padding-remove">
        <li><a href="{{$social_media->fb}}"  target="_blank"  class="uk-icon-button" uk-icon="facebook"></a></li>
        <li><a href="instagram://user?username={{$social_media->ig}}"  target="_blank"  class="uk-icon-button" uk-icon="instagram"></a></li>
        <li><a href="https://wa.me/{{$wa}}" target="_blank" class="uk-icon-button" uk-icon="whatsapp"></a></li>
      </ul>
    </div>
    <div class=" uk-text-left@m uk-text-left">
      <h4 class="uk-text-bold x-white-text">Lain-lain</h4>
      <ul class="uk-padding-remove-horizontal">
        <li><a href="terms-conditions" class="uk-button-text x-white-text x-cursor x-font-14">Terms and Conditions</a></li>
        <li><a href="how-to-shop" class="uk-button-text x-white-text x-cursor x-font-14">How to shop</a></li>
      </ul>
    </div>
    
  </div>
  
</section>
<div class="uk-text-center  x-font-12 uk-padding-small x-color-accent uk-width-1-1">
  <span class="uk-text-bold uk-text-capitalize">{{$x_setting['ST-0001']['isi']}}</span> &copy;   {{date_create()->format('Y')}}. Supported by <a href="#" class="uk-text-bold x-white-text">XIT foundation</a>
</div>