@extends('layouts.public')
@section('content')
<style>
  .x-color-red-text{
    color:#E81133;
  }
  .uk-button-default , .uk-button-default-white-hover{
    background-color:#E81133 !important;
    border-color: #E81133 !important;
  }
  .uk-button-default:hover{
    color:#E81133 !important;
  }
  .uk-button-default-white-hover:hover{
    color:white !important;
    border-color:white !important;
  }
</style>

<section  id="top-banner" class="uk-background-norepeat uk-background-bottom-right x-fullheight" style="background-image: url({{asset('storage/uploads/page/banner-web.jpg')}});background-color:#F5F5F5">
  <div class="uk-height-1-1 uk-flex-center uk-flex uk-flex-column uk-padding-large uk-visible@m">

    <p class="x-font-64 uk-text-capitalize uk-text-bold  x-color-red-text" style="line-height: 80px;">FERCOVA</p>
    <p class="x-font-24" style="max-width:650px;">Stunning template website from XIT foundation. It's totally Simply and Crazy Fast website ever</p>
    <a href="#" title="Explore more" class="uk-button uk-button-default uk-margin-medium-top" style="width:170px;"> Explore More </a>
  </div>
</section>

<div class="uk-flex-center uk-flex uk-flex-column uk-padding  uk-text-center uk-hidden@m">

  <p class="x-font-64 uk-text-capitalize uk-text-bold  x-color-red-text" style="line-height: 80px;">LAXAVEL</p>
  <p class="x-font-24" style="max-width:650px;">Stunning template website from XIT foundation. It's totally Simply and Crazy Fast website ever</p>
  <a href="#" title="Explore more" class="uk-button uk-align-center uk-button-default uk-margin-medium-top" style="width:170px;"> Explore More </a>
  <hr>
</div>

<section class="uk-container uk-padding uk-margin-large-top">
  <div class="uk-margin-large uk-text-center">
    <h2 class="uk-text-bold uk-text-capitalize">Price List of Create a website</h2>
    <p class="uk-align-center" style="max-width:550px">Thousands theme of laxavel ready to use, choose one <br>and  make it into your own.
    </p>
  </div>
 <div class="uk-grid uk-child-width-1-1 uk-child-width-1-4@m uk-text-center uk-grid-small uk-grid-match">
   
  <div class="uk-position-relative uk-margin-medium-top" style="min-height:450px">
     <div class="uk-card uk-padding-small uk-card-default uk-card-hover">
       <h3 class="uk-text-bold uk-margin-medium-top">Free</h3>
       <p class="uk-text-meta">IDR 0 / month</p>
       <hr>
       <ul class="uk-text-left uk-margin-medium-top uk-padding-small">
         <li class="uk-margin-small"><span uk-icon="icon:  triangle-right"></span> Shared Hosting 250MB</li>
         <li class="uk-margin-small"><span uk-icon="icon:  triangle-right"></span> Domain TLD ( .laxavel.com )</li>
         <li class="uk-margin-small"><span uk-icon="icon:  triangle-right"></span> Theme Standart</li>
         <li class="uk-margin-small"><span uk-icon="icon:  triangle-right"></span> 1 User account</li>
       </ul>
      <div class="uk-position-bottom uk-position-small">
        <hr>
        <button class="uk-button uk-button-default">Order now</button>
      </div>
     </div>
   </div>
   
  <div class="uk-position-relative  uk-margin-medium-top" style="min-height:700px">
     <div class="uk-card uk-padding-small uk-card-default uk-card-hover uk-border-rounded  " style="background: #04788d;color:white;">
       <h3 class="uk-text-bold uk-margin-medium-top x-white-text">Standart</h3>
       <p class="">IDR 62.500,- / month</p>
       <hr>
       <ul class="uk-text-left uk-margin-medium-top uk-padding-small">
          <li class="uk-margin-small"><span uk-icon="icon:  triangle-right"></span>Hosting Standart 1GB</li>
          <li class="uk-margin-small"><span uk-icon="icon:  triangle-right"></span>Domain TLD <br>
          <span class="uk-margin-small-left"> ( .com , .id , .co.id , .online )</span>
          </li>
          <li class="uk-margin-small"><span uk-icon="icon:  triangle-right"></span>Theme Standart</li>
          <li class="uk-margin-small"><span uk-icon="icon:  triangle-right"></span>1 User Account</li>
          <li class="uk-margin-small"><span uk-icon="icon:  triangle-right"></span>1 Email Account</li>
          <li class="uk-margin-small"><span uk-icon="icon:  triangle-right"></span>Free Training</li>
          <li class="uk-margin-small"><span uk-icon="icon:  triangle-right"></span>Support standart</li>
          <li class="uk-margin-small"><span uk-icon="icon:  triangle-right"></span>Renewal hosting + domain <br>
            <b class="uk-margin-medium-left">(IDR 500.000 / year)</b>
          </li>
       </ul>
       <div class="uk-position-bottom uk-position-small">
        <hr>
        <button class="uk-button uk-button-default-white-hover">Order now</button>
      </div>
     </div>
   </div>
   
  <div class="uk-margin-medium-top">
     <div class="uk-card uk-padding-small uk-card-default uk-card-hover">
       <h3 class="uk-text-bold uk-margin-medium-top">Premium</h3>
       <p class="uk-text-meta">IDR 375.000,- / month</p>
       <hr>
       <ul class="uk-text-left uk-margin-medium-top uk-padding-small">
          <li class="uk-margin-small"><span uk-icon="icon:  triangle-right"></span>Hosting Standart 20GB</li>
          <li class="uk-margin-small"><span uk-icon="icon:  triangle-right"></span>Domain TLD <br>
          <span class="uk-margin-small-left"> ( .com , .id , .co.id , .online )</span>
          </li>
          <li class="uk-margin-small"><span uk-icon="icon:  triangle-right"></span>Theme Premium</li>
          <li class="uk-margin-small"><span uk-icon="icon:  triangle-right"></span>SEO Optimation</li>
          <li class="uk-margin-small"><span uk-icon="icon:  triangle-right"></span>Multi User Account</li>
          <li class="uk-margin-small"><span uk-icon="icon:  triangle-right"></span>Multi Email Account</li>
          <li class="uk-margin-small"><span uk-icon="icon:  triangle-right"></span>Free Training</li>
          <li class="uk-margin-small"><span uk-icon="icon:  triangle-right"></span>Support Premium</li>
          <li class="uk-margin-small"><span uk-icon="icon:  triangle-right"></span>Renewal hosting + domain <br>
            <b class="uk-margin-medium-left">(IDR 2.500.000 / year)</b></li>
       </ul>
       <hr>
       <button class="uk-button uk-button-default">Order now</button>
     </div>
   </div>
   
  <div class="uk-margin-medium-top">
     <div class="uk-card uk-padding-small uk-card-default uk-card-hover">
       <h3 class="uk-text-bold uk-margin-medium-top">Exclusive</h3>
       <p class="uk-text-meta">IDR 625.000,- / month</p>
       <hr>
       <ul class="uk-text-left uk-margin-medium-top uk-padding-small">
          <li class="uk-margin-small"><span uk-icon="icon:  triangle-right"></span>Hosting Standart 40GB</li>
          <li class="uk-margin-small"><span uk-icon="icon:  triangle-right"></span>Domain TLD <br>
          <span class="uk-margin-small-left"> ( .com , .id , .co.id , .online )</span>
          </li>
          <li class="uk-margin-small uk-text-bold uk-color-theme-text"><span uk-icon="icon:  triangle-right"></span>Theme Exlusive</li>
          <li class="uk-margin-small"><span uk-icon="icon:  triangle-right"></span>SEO Optimation</li>
          <li class="uk-margin-small"><span uk-icon="icon:  triangle-right"></span>Multi User Account</li>
          <li class="uk-margin-small"><span uk-icon="icon:  triangle-right"></span>Multi Email Account</li>
          <li class="uk-margin-small"><span uk-icon="icon:  triangle-right"></span>Free Training</li>
          <li class="uk-margin-small"><span uk-icon="icon:  triangle-right"></span>Support Premium</li>
          <li class="uk-margin-small"><span uk-icon="icon:  triangle-right"></span>Renewal hosting + domain <br>
            <b class="uk-margin-medium-left">(IDR 2.500.000 / year)</b></li>
       </ul>
       <hr>
       <button class="uk-button uk-button-default">Order now</button>
     </div>
   </div>

 </div>
</section>

<div class="uk-width-auto@m uk-width-1-1 uk-padding uk-text-center uk-flex uk-flex-column uk-margin-large-top">
  <h3 class="uk-text-bold uk-uppercase ">Do you want create a unique website ? </h3>
  <p class="uk-align-center  uk-margin-remove-vertical" style="max-width:600px">If you don't want to use laxavel template, and you wanna have a unique website by customize based on your request. <b class="x-color-theme-text">Call Us</b>  We sure can do it for you. </b> </p>
  <a href="#" title="Explore more" class="uk-button uk-button-default uk-margin-medium-top uk-align-center  " style="width:210px;"> Call Us </a>

</div>

<hr>

  <section class="uk-text-center uk-container">
    <div>
      <h2 class="uk-text-bold uk-text-capitalize">Choose and get website your pride of</h2>
      <p class="uk-align-center" style="max-width:550px">Thousands theme of laxavel ready to use, choose one <br>and  make it into your own.
      </p>
    </div>
    <form id="form-search" method="GET" >
    <div>
     
      <div class="uk-padding-remove-vertical">
        <div class=" uk-flex uk-flex-middle uk-margin-medium-bottom">
            <div class="uk-search uk-search-default uk-width-1-1">
             
              <button type="submit" class="uk-search-icon-flip" uk-search-icon></button>
              <input id="keyword" name="keyword" class="uk-search-input uk-text-uppercase uk-text-center" type="search" placeholder="Check Availability of your domain in here " value="{{$keyword}}">
           
            </div>
            
        </div>

        <ul id="x-grid" class="uk-flex uk-align-center  uk-grid uk-padding-remove uk-flex-center uk-grid-match uk-child-width-1-4@m uk-child-width-1-2" uk-grid>
            
              @php
                  $x=1
              @endphp
              @for ($i = 1; $i < 25; $i++)
               <div>
                <li class="uk-card uk-card-hover uk-card-default x-cursor">
                  <img data-src="{{asset('storage/uploads/page/layout_website/'.strval($x).'.jpg')}}" uk-img alt="" srcset="">
                </li>
              </div>
                @php
                   $x == 5 ? $x = 1 : $x++;
                @endphp
                
              @endfor
        </ul>
  
        <div class="uk-padding uk-padding-remove-vertical uk-grid-small uk-flex uk-flex-middle uk-text-center" uk-grid>
          <div class="uk-width-auto">
          
              <select name="slc-paginate" id="slc-paginate" class="uk-select uk-form-small"  uk-tooltip="title: Count of dataview" style="width:60px">
                <option value="12" {{ request()->paginate == 12 || request()->paginate == null ? 'selected' : ''}}>12</option>
                <option value="24" {{ request()->paginate == 24  ? 'selected' : ''}}>24</option>
                <option value="48" {{ request()->paginate == 48  ? 'selected' : ''}}>48</option>
                <option value="96" {{ request()->paginate == 96  ? 'selected' : ''}}>96</option>
              </select>
          </div>

          <div class="uk-width-expand">
            
            {{ $data->links() }}
            
          </div>
        </div>
      </div>
    </div>

    <div id="canvas-category" uk-offcanvas="flip:true">
      <div class="uk-padding-small uk-offcanvas-bar uk-box-shadow-small">
        <button class="uk-offcanvas-close" type="button" uk-close></button>
        <p class="uk-text-bold uk-padding-small uk-padding-remove-bottom uk-margin-small uk-text-uppercase">Category Product</p>
        <div id="list-category" class=" uk-padding-small "></div>
        {{-- <button class="uk-button uk-button-default uk-align-center" id="btn-submit-filter">Filter Product</button> --}}
      </div>
    </div>
  </form>
  </section>

  <hr class="uk-container">
    
  <div class="uk-text-center uk-margin-medium-top">
    <h2 class="uk-text-bold uk-text-capitalize">Our Website Clients</h2>
    <p class="uk-align-center" style="max-width:370px">You can check our complete job for the website on our website clients in below.
    </p>
  </div>
  <div class="uk-container uk-padding ">

    <ul class="uk-child-width-1-6@m uk-child-width-1-3 uk-flex-center uk-grid uk-flex uk-flex-middle">
      <li class="uk-padding uk-card uk-card-hover x-cursor">
        <img data-src="{{asset('storage/uploads/page/clients/els.png')}}" alt="" uk-img>
      </li>
      <li class="uk-padding uk-card uk-card-hover x-cursor">
        <img data-src="{{asset('storage/uploads/page/clients/louise.png')}}" alt="" uk-img>
      </li>
      <li class="uk-padding uk-card uk-card-hover x-cursor">
        <img data-src="{{asset('storage/uploads/page/clients/jelajah.jpg')}}" alt="" uk-img>
      </li>
      <li class="uk-padding uk-card uk-card-hover x-cursor">
        <img data-src="{{asset('storage/uploads/page/clients/perumda.jpg')}}" alt="" uk-img>
      </li>
      <li class="uk-padding uk-card uk-card-hover x-cursor">
        <img data-src="{{asset('storage/uploads/page/clients/defurniture.png')}}" alt="" uk-img>
      </li>
      <li class="uk-padding uk-card uk-card-hover x-cursor">
        <img data-src="{{asset('storage/uploads/page/clients/nilamsari.png')}}" alt="" uk-img>
      </li>
      <li class="uk-padding uk-card uk-card-hover x-cursor">
        <img data-src="{{asset('storage/uploads/page/clients/sugarpastry.jpg')}}" alt="" uk-img>
      </li>
    
      
    </ul>
    
  </div>
  <hr>

  <section class="uk-container uk-margin-large-top">
     
    <blockquote cite="#" class="uk-text-center uk-margin-xlarge uk-width-1-1">
      <p class="uk-margin-small-bottom">"Do you want earn money from internet? Join in Our Affiliate partner"</p>
    <footer>more information you can click this link <cite><a href="{{url('/')}}" class="x-color-theme-text uk-text-bold">Become Affiliate</a></cite></footer>
    </blockquote>

  </section>
@endsection

<script>

        
      
  document.addEventListener('DOMContentLoaded',()=>{
    var categories = JSON.parse('{!! json_encode($category) !!}');
    $('#sort-asc').click(function (e) { 
      e.preventDefault();
      $('#sort').val('asc');
      $('#paginate').val($('#slc-paginate').val());
      $('#form-search').submit();
    });
    $('#sort-desc').click(function (e) { 
      e.preventDefault();
      $('#sort').val('desc');
      $('#paginate').val($('#slc-paginate').val());
      $('#form-search').submit();
    });
   

    initCategory();
    $('.content-img_thumb').click(function (e) { 
      e.preventDefault();
      var parent = this.parentNode.parentNode ;

      var imageThumb = parent.querySelector('.content-img_thumb');
      var imagePath = parent.querySelector('.content-image_path').innerHTML.split('|');

      var dataSrc  = $(imageThumb).attr('data-src');
      var title  = parent.querySelector('.content-title').innerHTML;
      var price  = parent.querySelector('.content-price').innerHTML;
      var htmlThumb  = '';
      var htmlPath  = '';
      var i = 0 ;
      var ukActive = 0 ;
      imagePath.forEach(path => {
         dataSrc == `{{asset('storage/')}}/`+ path ? ukActive = i : '';
        
        
        htmlThumb += `<li class="uk-background-contain" style="background-image:url({{asset('storage/')}}/${path})" alt="" srcset="" uk-img></li>`
        htmlPath += `<li uk-slideshow-item="${i}"><a class="" href="#"><img data-src="{{asset('storage/')}}/${path}" alt="" srcset="" style="width:48px;height:48px;object-fit:cover" uk-img></a></li>`
        i++;
      });

      $('#img-thumb-preview').html(htmlThumb);
      $('#img-path-preview').html(htmlPath);
      console.log(ukActive);
      
      var shortDesription  = parent.querySelector('.content-short_description').innerHTML;
      $('#img-product-preview').attr('data-src', dataSrc);
      
      $('#title-preview').html(title);
      $('#price-preview').html(price);
      $('#short-description-preview').html(shortDesription);
      
      UIkit.modal('#modal-view').show();
      $(`li[uk-slideshow-item="${ukActive}]"`).addClass('uk-active');
    });

    function initCategory(){
      var strip = '';
      var html = '';
      var stripCount = 0;

      if (categories.length == 0) {
        $('#list-category').append('<div class="uk-text-center">Category not found.</div>');
      }

      categories.forEach(category => {
        char_count(category.id_parent , '|') > stripCount ? stripCount = char_count(category.id_parent , '|') : stripCount;
      });

      for (var i = 0; i <= stripCount; i++) {
        categories.forEach(category => {
          strip = '';
          html= '';
          var cekStripCount = char_count(category.id_parent , '|') ;
          var indexOf       = category.id_parent.indexOf('|');
        
          if (cekStripCount !== 0) {
            for (var x = 0; x < i; x++) {
              strip +='--';
            }
          }
         
          if (cekStripCount == i) {
            var parent =  indexOf !== -1 ? category.id_parent.substring(0,indexOf) : '0';
            if (parent !== "0") {
              html +=`<div id="category-${category.id}"  class="uk-margin-small category"> 
                
                <span class="uk-margin-medium-left">${strip} </span><span class="category-name x-cursor link-category x-font-14" data-id="${category.id}">${category.name}</span></div>`;
              if ($('#category-'+parent).length) {
                  $('#category-'+parent).append(html);
              }else{
                $('#list-category').append(html);
                
              }
            }else{
              html +=`<div id="category-${category.id}" class="uk-margin-small category">
                
                ${strip} <span class="uk-text-bold x-cursor link-category x-font-14" data-id="${category.id}"> <span class="uk-icon" uk-icon="icon: triangle-right"></span> ${category.name}</span>   </div>`;
              $('#list-category').append(html);
            }
            return false;
          }
          
        });   
             
      }
      $('.btn-hapus').click(function (e) { 
        e.preventDefault();
        e.stopPropagation();
        var id = e.currentTarget.parentNode.id.replace(/category-/gi, '');
        $('#form-delete').attr('action', "{{url('xpanel/category-article/')}}"+'/'+id);
        UIkit.modal('#modal-delete').show();
      });
      $('.btn-edit').click(function (e) { 
        e.preventDefault();
        e.stopPropagation();
        var id =  e.currentTarget.parentNode.id.replace(/category-/gi , '');
        window.location.href = `{{url('xpanel/'.Request::segment(2).'/${id}/edit')}}`;
      });

        $('.link-category').click(function (e) { 
        e.preventDefault();
        $('#cek_category').val($(this).attr('data-id'));
        $('#form-search').submit();
      });
      
      
    }
    
    function char_count(str, letter) {
      var letter_Count = 0;
      for (var position = 0; position < str.length; position++) 
      {
          if (str.charAt(position) == letter) 
            {
            letter_Count += 1;
            }
        }
        return letter_Count;
    }

  });
</script>