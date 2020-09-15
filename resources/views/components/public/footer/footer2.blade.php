<section  class="uk-container uk-height-auto uk-text-left uk-margin-large-top" >
  <div class="uk-padding">
    <div class="uk-grid uk-flex uk-padding-small uk-padding-remove-horizontal uk-flex-middle">
      <p class="uk-margin-small-right">Follow Us </p>
      <ul class="uk-flex uk-flex-left@m uk-flex-center uk-padding-remove">
        <li><a title="youtube channel" href="{{!is_null($social_media) ? $social_media->yt : ''}}"  target="_blank"  class="uk-icon-button" uk-icon="youtube"></a></li>
        <li><a title="facebook page" href="{{!is_null($social_media) ? $social_media->fb : ''}}"  target="_blank"  class="uk-icon-button" uk-icon="facebook"></a></li>
        <li><a title="instagram" href="{{!is_null($social_media) ? $social_media->ig : ''}}"  target="_blank"  class="uk-icon-button" uk-icon="instagram"></a></li>
        <li><a title="whatsapp" href="https://wa.me/{{$wa}}" target="_blank" class="uk-icon-button" uk-icon="whatsapp"></a></li>
      </ul>
    </div>
    <hr class="uk-margin-remove">
    <div class="uk-child-width-1-5@m uk-child-width-1-2 uk-margin-small-top uk-padding-small uk-grid-small" uk-grid>
      <div >
        <p class="uk-text-bold  x-font-16">More About XIT</p>
        <ul class="uk-padding-remove-horizontal">
          <li><a title="Our Amazing team" href="{{url('team')}}" class="uk-button-text  x-cursor x-font-14">Our Amazing Team</a></li>
          <li><a title="Products" href="{{url('product')}}" class="uk-button-text  x-cursor x-font-14">Explore Our Products</a></li>
          <li><a title="Clients" href="{{url('client')}}" class="uk-button-text  x-cursor x-font-14">See Our Clients</a></li>
          <li><a title="About Us" href="{{url('about-us')}}" class="uk-button-text  x-cursor x-font-14">About Us</a></li>
          <li><a title="Contact Us" href="{{url('contact-us')}}" class="uk-button-text  x-cursor x-font-14">Contact Us</a></li>
          {{-- <li><a title="Our Goals" href="#" class="uk-button-text  x-cursor x-font-14">Our Goals</a></li> --}}
        </ul>
      </div>
      <div >
        <p class="uk-text-bold  x-font-16">Website</p>
        <ul class="uk-padding-remove-horizontal">
          <li><a title="Template Website" href="{{url('website').'#template'}}" class="uk-button-text  x-cursor x-font-14">Template Ready to Use</a></li>
          <li><a title="Portofolio" href="{{url('website').'#clients'}}" class="uk-button-text  x-cursor x-font-14">Clients of website</a></li>
          <li><a title="Pricing Website" href="{{url('website').'#price'}}" class="uk-button-text  x-cursor x-font-14">Pricing for website</a></li>
          <li><a title="SEO" href="{{url('seo')}}" class="uk-button-text  x-cursor x-font-14">SEO</a></li>
          {{-- <li><a title="Artikle" href="{{url('website')}}" class="uk-button-text  x-cursor x-font-14">Domains Checker</a></li> --}}
        </ul>
      </div>
      <div >
        <p class="uk-text-bold  x-font-16">Design & Animation</p>
        <ul class="uk-padding-remove-horizontal">
          <li><a title="name card" href="#" class="uk-button-text  x-cursor x-font-14">Name Card</a></li>
          <li><a title="banner" href="#" class="uk-button-text  x-cursor x-font-14">Banner</a></li>
          <li><a title="logo" href="#" class="uk-button-text  x-cursor x-font-14">Logo and Icon</a></li>
          <li><a title="video" href="#" class="uk-button-text  x-cursor x-font-14">Video Promotion</a></li>
          <li><a title="price design" href="#" class="uk-button-text  x-cursor x-font-14">Pricing for design</a></li>
        </ul>
      </div>
      <div >
        <p class="uk-text-bold  x-font-16">Application</p>
        <ul class="uk-padding-remove-horizontal">
          <li><a title="Retail App" href="{{url('application')}}" class="uk-button-text  x-cursor x-font-14">Retail Apps</a></li>
        </ul>
      </div>
      <div class=" uk-text-left@m uk-text-left">
        <p class="uk-text-bold  x-font-16">Other Links</p>
        <ul class="uk-padding-remove-horizontal">
          <li><a title="Help and support" href="{{url('help-and-support')}}" class="uk-button-text  x-cursor x-font-14">Help and support</a></li>
          <li><a title="terms and conditions" href="{{url('terms-and-conditions')}}" class="uk-button-text  x-cursor x-font-14">Terms and Conditions</a></li>
          {{-- <li><a title="Amazing talent" href="#" class="uk-button-text  x-cursor x-font-14">To be Amazing Talent</a></li> --}}
          {{-- <li><a title="affiliates" href="#" class="uk-button-text  x-cursor x-font-14">Affiliates</a></li>
          <li><a title="Careers" href="#" class="uk-button-text  x-cursor x-font-14">Careers</a></li> --}}
          <li><a title="Careers" href="{{url('sitemap')}}" class="uk-button-text  x-cursor x-font-14">Sitemap</a></li>
          <li><a title=".NET board" href="{{url('netboard')}}" class="uk-button-text  x-cursor x-font-14">.NET board</a></li>
        </ul>
      </div>
  
     
      
    </div>
  
    <hr>
    <div class="uk-flex uk-flex-column uk-margin-medium-top uk-flex-left uk-text-left">
      <img class="uk-border-rounded uk-margin-small-bottom" alt="{{$x_setting['ST-0001']['isi']}}" title="{{$x_setting['ST-0001']['isi']}}" data-src="{{asset('storage/uploads/page/logo.png')}}" alt="" srcset="" uk-img style="width:70px !important;">
      
      <p class="x-font-16 uk-text-bold  uk-text-capitalize uk-margin-remove uk-padding-remove uk-text-capitalize">XIT foundation</p>
  
      <p class="x-font-14 uk-text-capitalize">
        
        Office : <br> Gemah Raya St. 10 Jepara, Central Java ,  Indonesia <br>
        Phone : ( +62 291 ) 426 0520 <br>
        Mobile Phone : +62 896-4657-2727
      </p>
     
    </div>
  </div>

  
</section>
<div class="uk-text-center x-white-text  x-font-12 uk-padding-small x-color-accent uk-width-1-1">
  <h3 class="uk-flex-inline x-font-12 uk-margin-remove"><a title="xit foundation" href="http://www.xitfoundation.com" class="uk-text-bold " target="_blank">XIT foundation</a></h3> &copy;   {{date_create()->format('Y')}} All right reserved
</div>