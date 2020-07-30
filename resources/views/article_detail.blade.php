@extends('layouts.public')
@section('content')
  <section class="uk-text-center uk-height-small uk-background-cover uk-position-relative" data-src="{{asset('storage/uploads/page/bg_produk.jpg')}}" alt="" srcset="" uk-img  >
    <div class=" uk-position-cover ">

      <h3 class="uk-position-center uk-text-bold x-font-32 x-white-text uk-text-uppercase" style="text-shadow: 2px 4px 5px #4e4e4e;">{{$data[0]['title']}}</h3>
    </div>
  </section>

   <section class="uk-container uk-margin-large-bottom uk-margin-large-top">
     <div class="uk-grid uk-child-width-1-2@m uk-grid-small uk-padding-small">
       <div>
         <div uk-slideshow="animation: slide">
            @php
                $image_path =  explode('|', $data[0]['image_path']);
                $i = 0;
            @endphp
            @if (count($image_path) > 1 )
               <ul class="uk-slideshow-items uk-height-large" uk-lightbox>
                @foreach ($image_path as $image)
                    <a href="{{asset('storage/'.$image)}}">
                      <img class="uk-background-content uk-border-rounded uk-height-max-large uk-align-center" data-src="{{asset('storage/'.$image)}}" alt="" srcset="" uk-img>
                    </a>
                    @endforeach
               </ul>
               
               <ul class="uk-thumbnav uk-margin-small uk-grid-small uk-flex uk-flex-center">
                @foreach ($image_path as $image)
                  <li uk-slideshow-item="{{$i}}">
                    <a href="#">
                      
                      <img class="uk-align-center uk-border-rounded" data-src="{{asset('storage/'.$image)}}" alt="" srcset="" uk-img style="width:64px;height:64px;object-fit:cover">
                    </a>
                  </li>


                 @php
                     $i++
                 @endphp
                @endforeach
               </ul>
            @endif
         </div>
       </div>

       <div id="{{$data[0]['id']}}" class="uk-padding">
        <h2 class="uk-text-bold uk-margin-remove content-title">{{$data[0]['title']}}</h1>
      
        <p style="white-space: pre-wrap">{{$data[0]['short_description']}}</p>
     
        </div>

        
       </div>
     </div>
     <div class="uk-margin-large-top uk-padding">
        <ul class="uk-subnav uk-subnav-pill" uk-switcher style="border-bottom:1px solid #e2e2e2;">
          <li><a href="#">{{ $x_setting['ST-0001']['isi']}}</a></li>
        </ul>
        <ul class="uk-switcher">
          <li >
            {!! $data[0]['description'] !!}
          </li>
        </ul>
         
        <div class="uk-margin-medium-top">
         
            <div class="uk-text-bold uk-margin-small-top x-font-14 ">
              Share produk ini : 
              <a href="https://www.facebook.com/sharer/sharer.php?u={{URL::current()}}" target="_blank" class="uk-icon" uk-icon="icon: facebook;ratio:0.8"></a>
                <a href="https://twitter.com/share?url={{URL::current()}}" class="uk-icon" target="_blank" uk-icon="icon: twitter;ratio:0.8"></a>
                <a href="https://pinterest.com/pin/create/button/?url={{URL::current()}}"  target="_blank"class="uk-icon" uk-icon="icon: pinterest;ratio:0.8"></a>
                <a href="https://www.linkedin.com/shareArticle?mini=true&url={{URL::current()}}" target="_blank" class="uk-icon" uk-icon="icon: linkedin;ratio:0.8"></a>
                <a href="https://telegram.me/share/url?url={{URL::current()}}" class="uk-icon" target="_blank" uk-icon="icon: telegram;ratio:0.8"></a>
            </div>
            <div class="uk-text-bold x-font-14 ">Kategori : 
              @forelse ($categories as $category)
              <a href="#" class="x-color-theme-text uk-button-text"> {{ $category['name']}}</a>,  
              @empty
              @endforelse
            </div>
        </div>
     </div>

     
   </section>
   
@endsection