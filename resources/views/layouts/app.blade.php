<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'laxavel') }}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/xadmin.css') }}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/uikit.bundle.js') }}"></script>
    
    
    <style>
      #menu-mobile{
        font-size:10px !important;
        z-index: 1000;
        text-align: center
      }
    </style>
</head>
<body>
    <div id="app">
        <section id="xpanel" uk-grid class="uk-grid-collapse">
            <div id="sidebar" class="uk-width-auto uk-visible@m x-color-theme" style="width: 50px;">
                <div id="sidebar-title" class="x-color-theme uk-margin-bottom">
                    <a href="{{ url('dashboard') }}" class="uk-flex uk-flex-middle">
                        <img src="{{ asset('/img/logo.png') }}" style="height: 30px !important;"  alt="Logo">
                        <span id="sidebar-title-text" class="uk-text-bold x-font-12 uk-margin-small-left" style="display: none;min-width: 150px;">Laxavel <br><span ></span></span>
                    </a>
                </div>
                <x-sidebar />
            </div>

            <ul id="menu-mobile" class="uk-flex uk-flex-center uk-position-fixed uk-position-bottom-center x-color-theme uk-hidden@m x-fullwidth uk-grid-collapse uk-child-width-expand uk-padding-small uk-margin-remove " uk-grid>
              <li>
                <a href="{{ url('/xpanel') }}" class="uk-flex uk-flex-column">
                  <div class="x-icon x-icon-18 x-icon-dashboard x-margin-auto"></div>
                  <div>Overview</div>
                </a>
               
              </li>
              <li>
                <a href="{{ url('xpanel/article') }}" class="uk-flex uk-flex-column">
                  <div class="x-icon x-icon-18 x-icon-article x-margin-auto"></div>
                  <div>Article</div>
                </a>
                <ul uk-dropdown="offset:15;pos:top-center" class="uk-padding-remove-horizontal" style="border-radius:5px 5px 0 0 !important">
                  <li class="uk-padding-small"><a href="{{url('xpanel/article/create')}}"> <span uk-icon="icon: pencil"></span> New article</a></li>
                  <li class="uk-padding-small"><a href="{{url('xpanel/article')}}"> <span uk-icon="icon: menu"></span> List Of article</a></li>
                  <li class="uk-padding-small"><a href="{{url('xpanel/category-article')}}"> <span uk-icon="icon: thumbnails"></span>Category Article</a></li>
                </ul>
              </li>
              <li>
                <a href="{{ url('xpanel/product')}}" class="uk-flex uk-flex-column">
                  <div class="x-icon x-icon-18 x-icon-page x-margin-auto"></div>
                  <div>Product</div>
                </a>
                <ul uk-dropdown="offset:15;pos:top-center" class="uk-padding-remove-horizontal" style="border-radius:5px 5px 0 0 !important">
                  <li class="uk-padding-small"><a href="{{url('xpanel/product/create')}}"> <span uk-icon="icon: pencil"></span> New Product</a></li>
                  <li class="uk-padding-small"><a href="{{url('xpanel/product')}}"> <span uk-icon="icon: menu"></span> List Of Product</a></li>
                  <li class="uk-padding-small"><a href="{{url('xpanel/category-product')}}"> <span uk-icon="icon: thumbnails"></span>Category Product</a></li>
                </ul>
              </li>
              <li>
                <a href="{{url('xpanel/order-product')}}" class="uk-flex uk-flex-column">
                  <div class="x-icon x-icon-18 x-icon-product x-margin-auto"></div>
                  <div>Order</div>
                  
                </a>
              </li>
              
              <li>
                <a href="{{ url('xpanel/setting/company-profile') }}" class="uk-flex uk-flex-column">
                  <div class="x-icon x-icon-18 x-icon-pengaturan x-margin-auto"></div>
                  <div>Setting</div>
                  
                </a>
              </li>
            
              
            </ul>

            

            <div id="content" class="uk-width-expand" >
                <x-topnav />
                <section id="content-area">
                   <div class="uk-padding-small uk-container">
                    @yield('content')
                   </div>
                   <x-footer />
                   <div class="x-space-100"></div>
                  
                </section>
            </div>
        </section>

        <div id="loading" class=""></div>
    </div>
    
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('vendor/cleave/cleave.min.js') }}"></script>
    
   
</body>
</html>
