<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
     <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @php
      if (Request::segment(2) == 'detail') {
        $title =  Request::segment(3) . '('. Request('id') .')';
      }else{
        $suffix ='';
        if (Request::segment(1) == 'website'){
            $suffix = 'jasa pembuatan website jepara';
        }
        $title = config('app.name', 'laxavel').'  '. $suffix ;
      }
    @endphp

    
    <meta name="description" content="{{$title}}  merupakan software dan website developer dari indonesia khususnya jepara. dimana kami menerima jasa pembuatan website /  bikin website dari yang sederhana sampai yang professional. Selain website kami juga membuka jasa optimasi seo. agar website bisa terindeks oleh mesin pencari.">

    <meta name="keywords" content=" website , jasa pembuat website ,  jasa website  , jasa bikin website , bikin website , buat website , jasa website bagus , jasa website professional ,  jasa bikin website jepara, jasa website jepara , jasa pembuat website jepara, jasa pembuatan website , jasa web jepara" >

    <meta name="robots" content="index , follow">
    <meta name="author" content="{{ config('app.name' , 'laxavel') }}">
    <meta name="publisher" content="{{ config('app.name' , 'laxavel') }}">
    <link rel="canonical" href="{{Request::url()}}" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/xadmin.css') }}" rel="stylesheet">
    <link rel="image_src" href="{{asset('storage/uploads/page/logo.png')}}"/>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/uikit.bundle.js') }}"></script>
    
    <title> {{$title}}</title>
   
 <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-136823662-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-136823662-2');
</script>
    
    <title>{{ config('app.name', 'laxavel') }} - Software and Website Developer</title>
    <style>
      html{
        scroll-behavior: smooth;
      }
      a{
        color: #ffffff;
      }
      a:hover{
        text-decoration: none;
      }
      
     
      .uk-button-text::before {
        border-bottom: 2px solid var(--color-accent-public);
      }
      .height-80{
        height: 80px !important;
      }
      .x-link:hover{
        color: var(--color-theme) !important;
      }
      .uk-subnav-pill > .uk-active > a{
        background: var(--color-theme) !important;
        border-radius: 5px 5px 0 0;
      }

      
      .x-trans-up{

        transition: .3s ease-in-out;
      }
      .x-trans-up:hover{
        transform: translateY(-10px);
      }

      @media screen and (max-width: 960px){
        .content-img_thumb{
          max-height: 220px !important;
        }
        .title-product{
          font-size: 12px !important
        }
        .content-img_thumb{
          height:170px !important;
        }
        #btn-wa-bottom{
          bottom:100px !important;
        }

        a.menu:hover{
            color: white;
            background: #078285;
          }
       .x-font-64{
            font-size:32px !important;   
        }
      
      }
     
     
    </style>
    
</head>
<body>
   
  
    <header class="uk-box-shadow-small"  uk-sticky="animation: uk-animation-slide-top;top:300;" style="background:#ffffff; height:80px;">
      <x-public.header.header2 />
    </header>
    
    @yield('content')

    <div id="btn-wa-bottom"  class="x-trans-up uk-position-fixed uk-position-bottom-right x-padding-10 uk-border-circle" style="bottom:20px;right:20px;z-index:100;background: #078285;">
      
      <a title="{{$x_setting['ST-0001']['isi']}}" href="https://wa.me/{{$wa}}" class="uk-icon x-white-text" target="_blank" uk-icon="icon: whatsapp;ratio:1.4"></a>
    </div>

    <div id="modal-view" uk-modal>
      <div class="uk-modal-dialog uk-padding uk-padding-remove-horizontal" >
        <div class="uk-modal-body " uk-overflow-auto>
          <button class="uk-modal-close-default" type="button" uk-close></button>
          <div class="uk-position-relative uk-align-center" uk-slideshow="animation: fade">
            <ul id="img-thumb-preview" class="uk-slideshow-items" ></ul>
            <ul id="img-path-preview" class="uk-thumbnav uk-padding-small uk-flex-center uk-grid-small uk-slider-items uk-margin-small uk-overflow-auto" uk-grid></ul>
          </div>
        
          <div>
            <p id="title-preview" class="uk-margin-medium-top uk-text-bold uk-margin-remove-bottom x-font-18"></p>
            <p id="price-preview" class="uk-text-bold x-color-theme-public-text x-font-14 uk-margin-remove x-font-16"></p>
            <p id="short-description-preview" class="x-font-14" style="white-space: pre-wrap;"></p>
            <input type="text" name="" id="txt-url-share" style="display: none">
          </div>

        </div>
        <div class="uk-modal-footer uk-flex uk-child-width-expand">
          <div id="link-detail-preview"></div>
          <div class="uk-width-auto uk-margin-small-left">
            <a title="Share Produk ini" href="#" class="uk-icon-button btn-share-preview" uk-icon="social"  title="Copy link produk ini" uk-tooltip="pos: top" ></a>
            <a title="Whatsapp produk ini" href="#" class="uk-icon-button uk-text-success btn-whatsapp-preview" target="_blank" uk-icon="whatsapp"  title="Whatsapp Produk ini" uk-tooltip="pos: top" ></a>
          </div>
        </div>
      </div>
    </div>

    <footer class="uk-position-relative" style="background: #F8F9FA">
      <x-public.footer.footer2 />
    </footer>
   

    <script src="{{ asset('vendor/cleave/cleave.min.js') }}"></script>
    <script>
      document.addEventListener('DOMContentLoaded',()=>{

       // Select all links with hashes
        $('a[href*="#"]')
          // Remove links that don't actually link to anything
          .not('[href="#"]')
          .not('[href="#0"]')
          .click(function(event) {
            // On-page links
            if (
              location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
              && 
              location.hostname == this.hostname
            ) {
              // Figure out element to scroll to
              var target = $(this.hash);
              target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
              // Does a scroll target exist?
              if (target.length) {
                // Only prevent default if animation is actually gonna happen
                event.preventDefault();
                $('html, body').animate({
                  scrollTop: target.offset().top
                }, 1000, function() {
                  // Callback after animation
                  // Must change focus!
                  var $target = $(target);
                  $target.focus();
                  if ($target.is(":focus")) { // Checking if the target was focused
                    return false;
                  } else {
                    $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
                    $target.focus(); // Set focus again
                  };
                });
              }
            }
          });

        $('.pagination').addClass('uk-pagination uk-flex uk-flex-middle uk-flex-right x-font-12');
        $('.active').addClass('uk-active');

        $('.pagination li [rel=prev]').html('<span uk-pagination-previous></span>');
        $('.pagination li [rel=next]').html('<span uk-pagination-next></span>');
        $('.pagination li[aria-label="Next »"] span').html('<span uk-pagination-next></span>');
        $('.pagination li[aria-label="« Previous"] span').html('<span uk-pagination-previous></span>');
        
        
        $('.btn-add-cart').click(function (e) { 
          e.preventDefault();
          var parent       = this.parentNode.parentNode.parentNode
         
          var newProduct      = {
            'id'   : parent.id,
            'name' : parent.querySelector('.content-title').innerHTML,
            'qty'  : 1,
            'price': parent.querySelector('.price-product').innerHTML,
            'img_thumb' :parent.querySelector('.content-img_thumb').getAttribute('data-src'),
            'link' :parent.querySelector('.url_product').getAttribute('href')
          };

                   
          var oldCart = localStorage.getItem('cart') !== null ? JSON.parse(localStorage.getItem('cart')) : [];
          var qty = 1 ;
          if ($('#txt-qty-pesan').length > 0 ) {
            qty =  Number( $('#txt-qty-pesan').val() > 1 ?  $('#txt-qty-pesan').val() : 1) ;
          }

          var newStatus = true ;
         
          oldCart.forEach(product => {
            if (product.id == newProduct.id) {
              product.qty = product.qty + qty ;
              newStatus =false;
              return; 
            }
          });
          if (newStatus == true) {
            newProduct.qty = qty ;
            var newCart = oldCart !== null ? [...oldCart , newProduct ] : [newProduct];
            localStorage.setItem('cart' , JSON.stringify(newCart));
          }else{
           
            localStorage.setItem('cart' , JSON.stringify(oldCart));
          }
          UIkit.offcanvas('#canvas-cart').show();
          updateCart();
        });

        $('.btn-add-wishlist').click(function (e) { 
          e.preventDefault();
          var parent       = this.parentNode.parentNode
          var newProduct      = {
            'id'   : parent.id,
            'name' : parent.querySelector('.content-title').innerHTML,
            'qty'  : 1,
            'price': parent.querySelector('.price-product').innerHTML,
            'img_thumb' :parent.querySelector('.content-img_thumb').getAttribute('data-src'),
            'link' :parent.querySelector('.url_product').getAttribute('href')
          };
          
          var oldWishlist = localStorage.getItem('wishlist') !== null ? JSON.parse(localStorage.getItem('wishlist')) : [];
          var newStatus = true ;
         
         
          oldWishlist.forEach(product => {
            if (product.id == newProduct.id) {
              newStatus =false;
              return; 
            }
          });
          if (newStatus == true) {
            var newWishlist = oldWishlist !== null ? [...oldWishlist , newProduct ] : [newProduct];
            localStorage.setItem('wishlist' , JSON.stringify(newWishlist));
          }else{

            localStorage.setItem('wishlist' , JSON.stringify(oldWishlist));
          }
          UIkit.offcanvas('#canvas-wishlist').show();
          updateWishlist();
        });

        $('.btn-cart').click(function (e) { 
          e.preventDefault();
          updateCart();
        });
        $('.btn-wishlist').click(function (e) { 
          e.preventDefault();
          updateWishlist();
        });

        
      });

      $('.btn-share-preview').click(function (e) { 
        e.preventDefault();

        var link = document.querySelector('#txt-url-share');
        link.style.display = 'block';
        link.select()   
        document.execCommand('copy');
        link.style.display = 'none';
        UIkit.notification({message: 'Link telah tersalin' , timeout: 1500});
      });
     
      $('.btn-whatsapp').click(function (e) { 
        e.preventDefault();
        var parent  =  this.parentNode.parentNode;
        var a       = parent.querySelector('.url_product');
        var url     = $(a).attr('href');
        var namaBarang = $(`#${parent.id} .content-title`).html();
        var price = $(`#${parent.id} .price-product`).html();
        var imageThumb = $(`#${parent.id} .content-img_thumb`).attr('data-src');
        var qty = 1 ;
        if ($('#txt-qty-pesan').length > 0 ) {
          qty =  Number( $('#txt-qty-pesan').val() > 1 ?  $('#txt-qty-pesan').val() : 1) ;
        }
       
        var content = `Halo kak, mau pesen produk ini dong kak %0a===================== %0aDetail Pesan %0anama barang : ${namaBarang} %0aHarga : ${price.trim()} %0aJumlah Beli : ${qty} %0aCatatan : %0a===================== %0aLink produk: %0a${url}`

        window.open(`https://wa.me/6285641787121?text=${content}`,'_blank');
        

        
      });


      $('.content-img_thumb').click(function (e) { 
        e.preventDefault();
        e.stopPropagation();
        var parent = this.parentNode.parentNode ;
        
        var imageThumb = parent.querySelector('.content-img_thumb');
        var imagePath  = parent.querySelector('.content-image_path').innerHTML.split('|');

        var dataSrc   = $(imageThumb).attr('data-src');
        var title     = parent.querySelector('.content-title').innerHTML;
        var price     = parent.querySelector('.content-price').innerHTML;
        var htmlThumb = '';
        var htmlPath  = '';
        var i         = 0 ;
        var ukActive  = 0 ;
        var urlProduct = parent.querySelector('.url_product').getAttribute('href');
        imagePath.forEach(path => {
          dataSrc == `{{asset('storage/')}}/`+ path ? ukActive = i : '';

                        
          htmlThumb += `<li class="uk-background-contain " style="background-image:url({{asset('storage/')}}/${path})" alt="" srcset="" uk-img></li>`
          htmlPath += `<li uk-slideshow-item="${i}" class="thumbnav"><a title="{{$x_setting['ST-0001']['isi']}}" class="" href="#"><img data-src="{{asset('storage/')}}/${path}" alt="" srcset="" style="width:48px;height:48px;object-fit:cover" uk-img></a></li>`
          i++;
        });


        $('#img-thumb-preview').html(htmlThumb);
        $('#img-path-preview').html(htmlPath);
        $('#txt-url-share').val(`${urlProduct}`);

        var content = `Halo kak, mau pesen produk ini dong kak %0aLink produk: %0a${urlProduct}`
        $('.btn-whatsapp-preview').attr('href', `https://wa.me/6285641787121?text=${content}`);
       

        $('#link-detail-preview').html(`<a title="Detail Produk" href="${urlProduct}" class="uk-button-default uk-button">Lihat detail</a>`);

        var shortDesription  = parent.querySelector('.content-short_description').innerHTML;
        $('#img-product-preview').attr('data-src', dataSrc);
        
        $('#title-preview').html(title);
        $('#price-preview').html(price);
        $('#short-description-preview').html(shortDesription);
        
        UIkit.modal('#modal-view').show();

        $('.thumbnav').removeClass('uk-active');
        
        $(`li[uk-slideshow-item="${ukActive}"]`).addClass('uk-active');
      });



      function updateCart(){
      
        var cart = localStorage.getItem('cart') !== null ? JSON.parse(localStorage.getItem('cart')) : [];
        var html = '';
        var total = 0 ;
        cart.forEach(product => {
          html += ` <div class="uk-flex uk-child-width-auto uk-margin-small uk-margin-remove-horizontal">
                      <img data-src="${product.img_thumb}" alt="" srcset="" uk-img class="uk-background-cover uk-border-circle" style="width: 50px; height:50px;">
                      <div class="uk-width-epxand uk-margin-small-left uk-flex-inline">
                        <div class="uk-padding-small uk-padding-remove-vertical">
                          <p style="line-height:15px !important;margin-bottom:5px">
                            <a title="${product.name}" href="${product.link}" class="uk-text-bold x-font-14 x-color-theme-text" >${product.name} ( ${product.qty} )</a>
                          </p>
                          <p class="x-font-12 uk-text-muted uk-margin-remove">Harga : ${product.price}</p>
                          <div class="uk-width-auto">
                            <span id="${product.id}" class="btn-add-item x-cursor uk-icon-button uk-text-success" uk-icon="icon:plus;ratio:0.7" style="width:20px;height:20px;"></span>
                            <span id="${product.id}" class="btn-minus-item x-cursor uk-icon-button uk-text-danger" uk-icon="icon:minus;ratio:0.7" style="width:20px;height:20px;"></span>
                          </div>

                        </div>
                       
                      </div>
                      <div>
                        <a title="Hapus" id="${product.id}" href="#" class="uk-icon-button uk-button-danger btn-delete-item" uk-icon="icon: close;" style="width:32px;height:32px;"></a>
                      </div>
                    </div>`
          total += Number(product.qty) * Number(product.price.replace(/\D/gi , ''))
          
        });
        
        localStorage.setItem('total_order' , total);
        $('.total-belanja').html(Number((total).toFixed(1)).toLocaleString());
        html == '' ? html = '<div class="uk-placeholder uk-background-muted">Belum ada produk yang dimasukan ke keranjang belanja</div>' : '';
        $('.list-cart').html(html);

        $('.btn-delete-item').click(function (e) { 
          e.preventDefault();
          var oldCart = localStorage.getItem('cart') !== null ? JSON.parse(localStorage.getItem('cart')) : [];
          var i = 0;
          oldCart.forEach(product => {
            
            
            if (product.id == this.id) {

              oldCart.splice(i , 1)
              return; 
            }
            i++;
          });
          localStorage.setItem('cart' , JSON.stringify(oldCart));
          // UIkit.offcanvas('#canvas-cart').show();
          updateCart();
        });

        $('.btn-add-item').click(function (e) { 
          e.preventDefault();
          var oldCart = localStorage.getItem('cart') !== null ? JSON.parse(localStorage.getItem('cart')) : [];
          var i = 0;
          oldCart.forEach(product => {
            
            if (product.id == this.id) {
              
              product.qty++
              
              return; 
            }
          });
          localStorage.setItem('cart' , JSON.stringify(oldCart));
          // UIkit.offcanvas('#canvas-cart').show();
          updateCart();
        });
        $('.btn-minus-item').click(function (e) { 
          e.preventDefault();
          var oldCart = localStorage.getItem('cart') !== null ? JSON.parse(localStorage.getItem('cart')) : [];
          var i = 0;
          oldCart.forEach(product => {
            
            if (product.id == this.id) {
              
              product.qty <= 1 ? product.qty = 1 : product.qty-- 
              
              return; 
            }
          });
          localStorage.setItem('cart' , JSON.stringify(oldCart));
          // UIkit.offcanvas('#canvas-cart').show();
          updateCart();
        });
      }

      function updateWishlist(){
          
          var wishlist = localStorage.getItem('wishlist') !== null ? JSON.parse(localStorage.getItem('wishlist')) : [];
          var html = '';
          wishlist.forEach(product => {
            html += ` <div class="uk-flex uk-child-width-auto uk-margin-small uk-margin-remove-horizontal">
                        <img data-src="${product.img_thumb}" alt="" srcset="" uk-img class="uk-background-cover uk-border-circle" style="width: 50px; height:50px;">
                        <div class="uk-width-epxand uk-margin-small-left uk-flex-inline">
                          <div class="uk-padding-small uk-padding-remove-vertical">
                            <p style="line-height:15px !important;margin-bottom:5px">
                              <a title="${product.name}" href="${product.link}" class="uk-text-bold x-font-14 x-color-theme-text" >${product.name}</a>
                            </p>
                            <p class="x-font-12 uk-text-muted uk-margin-remove">Harga : ${product.price}</p>
                          </div>
                        </div>
                        <div>
                          <a title="Hapus" id="${product.id}" href="#" class="uk-icon-button uk-button-danger btn-delete-item" uk-icon="icon: close;" style="width:32px;height:32px;"></a>
                        </div>
                      </div>`
           
            
          });
          
          
          html == '' ? html = '<div class="uk-placeholder uk-background-muted">Belum ada produk yang dimasukan ke daftar suka</div>' : '';
          $('.list-wishlist').html(html);

          $('.btn-delete-item').click(function (e) { 
            e.preventDefault();
            var oldwishlist = localStorage.getItem('wishlist') !== null ? JSON.parse(localStorage.getItem('wishlist')) : [];
            var i = 0;
            oldwishlist.forEach(product => {
              
              
              if (product.id == this.id) {

                oldwishlist.splice(i , 1)
                return; 
              }
              i++;
            });
            localStorage.setItem('wishlist' , JSON.stringify(oldwishlist));
            // UIkit.offcanvas('#canvas-wishlist').show();
            updateWishlist();
          });

          
        }
    </script>

</body>
</html>
