
@forelse ($data as $content)               
    <div>
      <div id="{{$content['id']}}" class="uk-card uk-card-default uk-border-rounded uk-overflow-hidden uk-transition-toggle uk-position-relative"  uk-responsive>
        <div  class="uk-card-media-top uk-background-cover content-img_thumb uk-height-medium  x-cursor"  data-src ="{{ is_null($content['image_thumb']) || empty($content['image_thumb']) ? asset('images/photo.svg')  : asset('storage/'.$content['image_thumb']) }}" uk-img>
        </div>
        <div class="uk-flex uk-flex-column uk-width-auto uk-position-top-right uk-position-small uk-padding-remove uk-overlay-default uk-overlay uk-box-shadow-small uk-transition-slide-right-small x-white-text uk-position-z-index">
          <a href="#" class="uk-icon-button uk-text-success btn-whatsapp" uk-icon="whatsapp"  title="Chat via whatsapp" uk-tooltip="pos: left" ></a>
          <a  href="{{url('product/detail/'.$content['slug'].'?id='.$content['id'])}}" class="uk-icon-button" uk-icon="info"  title="Detail Produk" uk-tooltip="pos: left" ></a>
          <a href="#" class="uk-icon-button btn-add-wishlist" uk-icon="heart"  title="Tambah ke daftar suka" uk-tooltip="pos: left" ></a>
        </div>
        <div class="uk-card-body uk-text-left uk-text-baseline uk-padding-small uk-flex uk-child-width-expand">
          <div class="x-grid-desc">
            <a class="url_product" href="{{url('product/detail/'.$content['slug'].'?id='.$content['id'])}}" >
              <h5 class="uk-text-capitalize x-font-12 uk-width-expand uk-text-bold  uk-margin-remove content-title x-link ">{{ $content['title']}}</h5>
            </a>
            <p class="uk-hidden content-short_description" >{{ $content['short_description']}}</p>
            <p class="uk-hidden content-image_path">{{ $content['image_path']}}</p>
            <p class="uk-text-capitalize x-font-10 uk-width-expand uk-text-bold uk-margin-remove content-price">
              @if ($content['price_promo'] > 0 )
              <span class="uk-width-expand  uk-margin-remove uk-text-danger" style="text-decoration: line-through;">Rp. {{ number_format($content['price'])}}</span> <br>
              <span class="uk-width-expand  uk-margin-remove price-product">Rp. {{ number_format($content['price_promo'])}}</span>

              @else
                <span class="price-product">Rp. {{ number_format($content['price'])}} </span>
              @endif

            </p>
            
          </div>
          <div class="uk-position-bottom-right uk-width-auto" style="transform: translate(-10px,-10px)">
            <a href="#" class="uk-icon-button btn-add-cart uk-text-bold" uk-icon="cart"  title="Tambah ke keranjang" uk-tooltip="pos: left" ></a>
          </div>
        </div>
      </div>
    </div>
@empty
    <div class="x-font-20 uk-width-1-1 uk-background-muted  uk-text-center"><p class="uk-padding">Product not found</p></div>
@endforelse


