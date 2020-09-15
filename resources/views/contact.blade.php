@extends('layouts.public')
@section('content')

<section class="uk-text-center uk-height-small uk-background-cover uk-position-relative" data-src="{{asset('storage/uploads/page/bg_produk.jpg')}}" alt="" srcset="" uk-img  >
  <div class=" uk-position-cover ">

    <h3 class="uk-position-center uk-text-bold x-font-32 x-white-text uk-text-uppercase" style="text-shadow: 2px 4px 5px #4e4e4e;">Contact Us</h3>
  </div>
</section>
<section class="uk-container uk-padding uk-text-center">
  <h3 class="x-font-24 uk-text-bold">Head Office in Jepara, Indonesia</h3>
  <p>
    <b>Address</b> <br>
    Gemah Raya St. 10 Jepara, Central Java , Indonesia <br>
    Phone : ( +62 291 ) 426 0520 <br>
    Mobile Phone : +62 896-4657-2727 <br>
    Email: halo@xitfoundation.com
  </p>
 <div class="uk-align-center">
  <ul class="uk-flex uk-flex-center uk-padding-remove">
    <li><a title="youtube channel" href="{{!is_null($social_media) ? $social_media->yt : ''}}"  target="_blank"  class="uk-icon-button" uk-icon="youtube"></a></li>
    <li><a title="facebook page" href="{{!is_null($social_media) ? $social_media->fb : ''}}"  target="_blank"  class="uk-icon-button" uk-icon="facebook"></a></li>
    <li><a title="instagram" href="{{!is_null($social_media) ? $social_media->ig : ''}}"  target="_blank"  class="uk-icon-button" uk-icon="instagram"></a></li>
    <li><a title="whatsapp" href="https://wa.me/{{$wa}}" target="_blank" class="uk-icon-button" uk-icon="whatsapp"></a></li>
  </ul>
 </div>
 <div class="x-space-100"></div>
</section>
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1666.427529687384!2d110.67893403403625!3d-6.5902359796843735!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e711f3b6e558ad9%3A0xd66d30942b32baa4!2sXIT%20foundation%20(%20Jasa%20pembuatan%20website%20%2F%20sofware%20%2F%20apps%20)!5e0!3m2!1sen!2sid!4v1599882718254!5m2!1sen!2sid" width="100%" height="650" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

@endsection

