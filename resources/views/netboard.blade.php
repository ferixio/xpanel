@extends('layouts.public')
@section('content')

  <section class="uk-text-center uk-height-small uk-background-cover uk-position-relative x-color-theme"  >
    <div class=" uk-position-cover ">

      <h1 class="uk-position-center uk-text-bold x-font-32 x-white-text uk-text-uppercase" style="text-shadow: 2px 4px 5px #4e4e4e;">.NET board</h1>
    </div>
  </section>

   
  <blockquote cite="#" class="uk-text-center uk-margin-medium uk-width-1-1">
    <p class="uk-margin-small-bottom">"Share and care can make our live to be better."</p>
  <footer>someone famous in XIT foundation <cite><a href="https://www.facebook.com/fercova/" target="_blank" class="x-color-theme-text uk-text-bold">Ferixio</a></cite></footer>
  </blockquote>


  <section class="uk-container uk-padding">
    <form id="form-search" method="GET" >
    <div class="uk-grid-collapse" uk-grid>
     
      <div class="uk-width-expand uk-padding uk-padding-remove-vertical">
        <div class="uk-grid-small uk-flex uk-flex-middle uk-padding-large uk-padding-remove-vertical" uk-grid>
            <div class="uk-search uk-search-default uk-width-expand">
              <input type="hidden" name="sort" id="sort" value="{{$sort}}">
              <input type="hidden" name="paginate" id="paginate" value="{{$paginate}}">
              <input type="hidden" name="cek_category" id="cek_category" {{$filter}}>
              <button type="submit" class="uk-search-icon-flip" uk-search-icon></button>
              <input id="keyword" name="keyword" class="uk-search-input" type="search" placeholder="Search ...  " value="{{$keyword}}">
           
            </div>
            
            {{-- <div class="uk-width-auto">
              <ul class="uk-iconnav uk-child-width-expand uk-text-center  uk-padding-remove-vertical uk-flex uk-flex-middle">
                <li><a id="btn-filter" href="#" uk-toggle="target: #canvas-category"  uk-icon="icon: settings" uk-tooltip="title: Filter berdasarkan kategori"></a></li>
              </ul>
            </div> --}}
        </div>

        <div class="uk-flex   uk-grid-small uk-padding-large uk-flex-center uk-grid-match" uk-grid>
            
              @forelse ($data as $content)               
                <div class=" uk-flex uk-margin-medium uk-flex-middle " >
                  <div class="uk-width-auto@m uk-width-1-1 uk-padding">
                    <div  class="uk-border-circle uk-width-small uk-background-cover uk-height-small uk-align-center"  data-src ="{{ is_null($content['image_thumb']) || empty($content['image_thumb']) ? asset('images/photo.svg')  : asset('storage/'.$content['image_thumb']) }}" uk-img>
                    </div>
                  </div>
                  <div class="uk-width-expand">
                    <div class="uk-text-center uk-text-left@m  uk-text-baseline uk-flex uk-child-width-expand">
                      <div>
                        <a class="url_product" href="{{strtolower(url('article/detail/'.$content['slug'].'?id='.$content['id']))}}" >
                          <h2 class="uk-text-capitalize uk-width-expand x-font-24 uk-text-bold  uk-margin-remove content-title x-link ">{{ $content['title']}}</h2>
                        </a>
                        <p class="uk-text-meta x-font-12 uk-margin-small-top">Oleh : <b>{{$content['publisher']}}</b> <br> {{ date_format(new DateTime($content['created_at']) , 'd-M-Y H:i') }} </p>
                        <p class="content-short_description" >{{ $content['short_description']}}</p>
                        <a href="{{url('article/detail/'.$content['slug'].'?id='.$content['id'])}}" class="uk-button uk-button-default " style="widht:200px">Selengkapnya</a>
                        
                        
                      </div>
                    
                    </div>
                  </div>
                </div>
              @empty
              <div class="x-font-20 uk-width-1-1 uk-background-muted  uk-text-center"><p class="uk-padding">Article not found</p></div>
              @endforelse
        </div>
        <hr>
  
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
        <p class="uk-text-bold uk-padding-small uk-padding-remove-bottom uk-margin-small uk-text-uppercase">Category Article</p>
        <div id="list-category" class=" uk-padding-small "></div>
        {{-- <button class="uk-button uk-button-default uk-align-center" id="btn-submit-filter">Filter Product</button> --}}
      </div>
    </div>
  </form>
  </section>
@endsection

<script>
  document.addEventListener('DOMContentLoaded',()=>{
    var categories = JSON.parse('{!! json_encode($category) !!}');
   
  
    initCategory();


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
                
                ${strip} <span class="category-name x-cursor link-category x-font-14" data-id="${category.id}">${category.name}</span></div>`;
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