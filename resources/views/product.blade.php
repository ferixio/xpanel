@extends('layouts.public')
@section('content')

  <section class="uk-text-center uk-height-small uk-background-cover uk-position-relative" data-src="{{asset('storage/uploads/page/bg_produk.jpg')}}" alt="" srcset="" uk-img  >
    <div class=" uk-position-cover ">

      <h3 class="uk-position-center uk-text-bold x-font-32 x-white-text uk-text-uppercase" style="text-shadow: 2px 4px 5px #4e4e4e;">Daftar Produk Kami</h3>
    </div>
  </section>

  <section class="uk-container uk-padding">
    <div class="uk-grid-collapse" uk-grid>
     
      <div class="uk-width-expand uk-padding uk-padding-remove-vertical">
        <div class="uk-grid-small uk-flex uk-flex-middle" uk-grid>
            <form action="{{ url('xpanel/article/') }}" method="GET" class="uk-search uk-search-default uk-width-expand@m">
              <button type="submit" class="uk-search-icon-flip" uk-search-icon></button>
              <input id="keyword" name="keyword" class="uk-search-input" type="search" placeholder="Search ..." value="">
            </form>
            <div class="uk-width-auto@m" style="min-width: 350px;">
              <ul class="uk-iconnav uk-child-width-expand uk-text-center uk-padding uk-padding-remove-vertical">
                <li><a id="btn-filter" href="#" uk-toggle="target: #canvas-category"  uk-icon="icon: settings" uk-tooltip="title: Filter Category"></a></li>
                <li><a id="btn-grid" href="#" uk-icon="icon: thumbnails" uk-tooltip="title: Grid view"></a></li>
                <li><a id="btn-list" href="#" uk-icon="icon: menu" uk-tooltip="title: List view"></a></li>
                <li><a id="sort-asc" href="" uk-icon="icon: pull" uk-tooltip="title: Sortir A-Z"></a></li>
                <li><a  id="sort-desc"  href="#" uk-icon="icon: push" uk-tooltip="title: Sortir Z-A"></a></li>
              </ul>
            </div>
        </div>

        <div id="x-grid" class="uk-flex   uk-grid-small uk-padding-small uk-flex-center uk-grid-match uk-child-width-1-4@m uk-child-width-1-2" uk-grid>
            <x-public.section.grid1 :data="$data" />
        </div>
           

        <hr>
  
        <div class="uk-padding uk-padding-remove-vertical uk-grid-small uk-flex uk-flex-middle uk-text-center" uk-grid>
          <div class="uk-width-auto">
          
              <select name="count" id="count" class="uk-select uk-form-small"  uk-tooltip="title: Count of dataview" style="width:60px">
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

    <div id="canvas-category" uk-offcanvas>
      <div class="uk-padding-small uk-offcanvas-bar uk-box-shadow-small">
        <button class="uk-offcanvas-close" type="button" uk-close></button>
        <p class="uk-text-bold uk-padding-small uk-padding-remove-bottom uk-margin-small">Kategori Produk</p>
        <div id="list-category" class=" uk-padding-small "></div>
      </div>
    </div>
  </section>
@endsection

<script>
  document.addEventListener('DOMContentLoaded',()=>{
    var categories = JSON.parse('{!! json_encode($category) !!}');
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
                <input type="checkbox" name="cek-category" id="cek-category" class="uk-margin-small-right">
                ${strip} <span class="category-name x-cursor">${category.name}</span></div>`;
              if ($('#category-'+parent).length) {
                  $('#category-'+parent).append(html);
              }else{
                $('#list-category').append(html);
                
              }
            }else{
              html +=`<div id="category-${category.id}" class="uk-margin-small category">
                <input type="checkbox" name="cek-category" id="cek-category" class="uk-margin-small-right">
                ${strip} <span class="uk-text-bold x-cursor">${category.name}</span>   </div>`;
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