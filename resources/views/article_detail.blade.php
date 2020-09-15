@extends('layouts.public')
@section('content')
  <section class="uk-text-center uk-height-small uk-background-cover uk-position-relative x-color-theme"   >
    <div class=" uk-position-cover ">

      <h3 class="uk-position-center uk-text-bold x-font-32 x-white-text uk-text-uppercase" style="text-shadow: 2px 4px 5px #4e4e4e;">Share something usefull</h3>
    </div>
  </section>

   <section class="uk-container uk-margin-large-bottom uk-margin-large-top" style="max-width:700px">
     <div class="uk-grid uk-child-width-1-1 uk-grid-small uk-padding-small">
       <div>
         <div uk-slideshow="animation: slide">
            @php
                $image_path =  explode('|', $data[0]['image_path']);
                $image_thumb = $data[0]['image_thumb'];
                $i = 0;
            @endphp
            @if (count($image_path) > 0 )
               <ul class="uk-slideshow-items uk-position-relative" uk-lightbox style="height: 500px">
                @foreach ($image_path as $image)
                    <a href="{{asset('storage/'.$image)}}" >
                      <img class="uk-background-contain uk-border-rounded  uk-position-center" data-src="{{asset('storage/'.$image)}}" alt="" srcset="" uk-img>
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
        <h1 class="uk-text-bold uk-margin-remove x-font-24 content-title">{{$data[0]['title']}}</h1>
      
        <p style="white-space: pre-wrap">{{$data[0]['short_description']}}</p>
     
        </div>

        
       </div>
     </div>
     <div class="uk-margin-large-top uk-padding uk-align-center" >
        <ul class="uk-subnav uk-subnav-pill" uk-switcher style="border-bottom:1px solid #e2e2e2;">
          <li><a href="#">Details of Article</a></li>
        </ul>
        <ul class="uk-switcher">
          <li >
            {!! $data[0]['description'] !!}
          </li>
        </ul>
         
        <div class="uk-margin-medium-top">
         
            <div class="uk-text-bold uk-margin-small-top x-font-14 ">
              Share this article : 
              <a title="facebook" href="https://www.facebook.com/sharer/sharer.php?u={{URL::current()}}" target="_blank" class="uk-icon" uk-icon="icon: facebook;ratio:0.8"></a>
                <a title="twitter" href="https://twitter.com/share?url={{URL::current()}}" class="uk-icon" target="_blank" uk-icon="icon: twitter;ratio:0.8"></a>
                <a title="" href="https://pinterest.com/pin/create/button/?url={{URL::current()}}"  target="_blank"class="uk-icon" uk-icon="icon: pinterest;ratio:0.8"></a>
                <a title="lingkedin" href="https://www.linkedin.com/shareArticle?mini=true&url={{URL::current()}}" target="_blank" class="uk-icon" uk-icon="icon: linkedin;ratio:0.8"></a>
                <a title="telegram" href="https://telegram.me/share/url?url={{URL::current()}}" class="uk-icon" target="_blank" uk-icon="icon: telegram;ratio:0.8"></a>
            </div>
            <div class="uk-text-bold x-font-14 ">category : 
              @forelse ($categories as $category)
              <a href="#" class="x-color-theme-text uk-button-text"> {{ $category['name']}}</a>,  
              @empty
              @endforelse
            </div>
        </div>
     </div>

     
   </section>
   <script>
     document.addEventListener('DOMContentLoaded',()=>{
       $('link[rel="image_src"]').attr('href', '{{$image_thumb}}');
     });
   </script>
   
@endsection