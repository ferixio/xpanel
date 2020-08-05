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

  @media screen and (max-width: 900px){
    #coming_soon{
      transform: translateX(0px) !important;
    }
  }
</style>

<section  id="top-banner" class="uk-background-norepeat uk-background-cover uk-background-center-right x-fullheight" style="background-image: url({{asset('storage/uploads/page/coming_soon.jpg')}});background-color:#F5F5F5">
  <div class="uk-height-1-1 uk-flex-center uk-flex uk-flex-column uk-padding-large ">

    <p id="coming_soon" class="x-font-64 uk-text-capitalize uk-text-right x-white-text" style="line-height: 80px;transform: translateX(-200px);line-height: 100px"><b>Delicious page</b> <br> will <b class="x-color-red-text">coming</b> soon</p>
  
  </div>
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