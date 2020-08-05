<div class="uk-padding uk-position-relative" uk-slider="autoplay: true;autoplay-interval: 3500;pause-on-hover:false">
  <div class="uk-slider-container uk-padding">
    <ul class="uk-slider-items uk-child-width-1-4@m uk-grid uk-grid-match">
     @foreach ($data as $row)
      <li class="uk-text-center">
        <div class="uk-box-shadow-small uk-overflow-hidden uk-border-rounded">
            <img  title="{{$row['title']}}" alt="{{$row['title']}}" class="uk-height-small" data-src ="{{ is_null($row['image_thumb']) || empty($row['image_thumb']) ? asset('images/photo.svg')  : asset('storage/'.$row['image_thumb']) }}" uk-img >
            <div class="uk-padding uk-position-relative">
              <h2 class="uk-text-bold uk-position-center x-font-14"><a title="{{$row['title']}}" href="{{url('article/detail/'.$row['slug'].'?id='.$row['id'])}}" class="x-color-theme-text">{{$row['title']}}</a></h2>

            </div>
          </div>
        </li>
     @endforeach
      
    </ul>
  </div>
  {{-- <ul class="uk-slider-nav uk-dotnav uk-position-bottom-center uk-margin"></ul> --}}

    <div class="uk-hidden@s uk-light">
      <a title="prev" class="uk-position-center-left uk-position-small" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
      <a title="next" class="uk-position-center-right uk-position-small" href="#" uk-slidenav-next uk-slider-item="next"></a>
  </div>

  <div class="uk-visible@s">
      <a title="prev" class="uk-position-center-left-out uk-position-small" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
      <a title="next" class="uk-position-center-right-out uk-position-small" href="#" uk-slidenav-next uk-slider-item="next"></a>
  </div>

</div>