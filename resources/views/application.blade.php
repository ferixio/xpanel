@extends('layouts.public')
@section('content')
<style>
  .x-color-red-text{
    color:#4697FF;
  }
  .uk-button-default , .uk-button-default-white-hover{
    background-color:#4697FF !important;
    border-color: #4697FF !important;
  }
  .uk-button-default:hover{
    color:#4697FF !important;
  }
  .uk-button-default-white-hover:hover{
    color:white !important;
    border-color:white !important;
  }
</style>

<div class="uk-margin-large uk-container" style="min-height:80vh">
  <h1 class="uk-hidden">XIT foundation - jasa pembuatan aplikasi retail</h1>
  <div class="  uk-child-width-1-2@m uk-child-width-1-1  uk-grid uk-text-left@m uk-text-center">
    <div class="uk-background-contain" data-src="{{asset('storage/uploads/page/desktop.gif')}}" alt="" srcset="" uk-img style="min-height: 300px">
    </div>
    <div class="uk-padding-large  ">
      <h3 class="uk-text-bold uk-uppercase x-font-64">Application for Management</h3>
      <hr>
      <p class="uk-margin-remove-vertical uk-align-center uk-align-left@m" style="max-width:500px">Do you feel inconvenience about financial report, Customer complain and stock management? we bringing easer way to can handle that. <br><br> You can try  our application for management<br> <b>Fercova X5</b> </p> 
      <a href="#detail" title="Explore more" class="uk-button uk-button-default uk-margin-medium-top" style="width:230px;"> What is Fercova X5? </a>
      
      
    </div>
  </div>
</div>
<hr>

<div id="detail"  class="uk-margin-xlarge uk-container" style="">

  <div class="  uk-child-width-1-2@m uk-child-width-1-1  uk-grid uk-text-left@m uk-text-center">
   
    <div class="uk-padding uk-padding-large ">
      <h3 class="uk-text-bold uk-uppercase x-font-64">Fercova X5</h3>
      <hr>
      <p class="uk-margin-remove-vertical uk-align-center uk-align-left@m" style="max-width:500px">If you have bussiness in minimarket /  retail bussiness, you should to try <b>Fercova X5</b>. It has many features you can use to handle minimarket proses, like stock management, Sales Report ,  debts and receivables report until on your accounting report. <br><br> Call us we'll show you all kind of feature you need in retail bussiness. </p> 
    <a href="http://wa.me/{{$wa}}?text=kak, mau tanya tentang Aplikasi fercova X5 bisa?" title="Explore more" class="uk-button uk-button-default uk-margin-medium-top" style="width:260px;"> Ask about Fercova X5 </a>
      
      
    </div>
    

    <div class="uk-position-relative" uk-slideshow="animation: slide">
        <ul class="uk-slideshow-items uk-border-rounded uk-overflow-hidden uk-box-shadow-small uk-margin-medium-bottom" uk-lightbox>
          @for ($i = 1; $i <= 10; $i++)
            <a href="{{asset('storage/uploads/page/fercova/'.$i.'.jpg')}}">
              <img data-src="{{asset('storage/uploads/page/fercova/'.$i.'.jpg')}}" alt="" srcset="" uk-img>
            </a>
          @endfor
        </ul>
    
        <div class="uk-position-bottom-center-out uk-position-small">
            <ul class="uk-thumbnav uk-child-width-1-5">
              @for ($i = 1; $i <= 10; $i++)
              <li uk-slideshow-item="{{$i-1}}"  class="uk-margin-small" ><a href="#"><img data-src="{{asset('storage/uploads/page/fercova/'.$i.'.jpg')}}"  width="100" alt="" uk-img></a></li>
              @endfor
               
            </ul>
        </div>
    
    </div>
  </div>
</div>


<section class="uk-container uk-padding uk-margin-large-top" style="margin-top:200px !important">
  <div class="uk-margin-large uk-text-center">
    <h2 class="uk-text-bold uk-text-capitalize">Price List of Fercova X5</h2>
    <p class="uk-align-center" style="max-width:550px">Many feature we offering to you <br>but only used what you need is better.
    </p>
  </div>
 <div class="uk-grid uk-child-width-1-1 uk-child-width-1-4@m uk-text-center uk-grid-small uk-grid-match">
   
  <div class="uk-position-relative uk-margin-medium-top" style="min-height:550px">
     <div class="uk-card uk-padding-small uk-card-default uk-card-hover">
       <h3 class="uk-text-bold uk-margin-medium-top">Small Company</h3>
       <p class="uk-text-meta">IDR 1.500.000</p>
       <hr>
       <ul class="uk-text-left uk-margin-medium-top uk-padding-small">
         <li class="uk-margin-small"><span uk-icon="icon:  triangle-right"></span> Purchace Process</li>
         <li class="uk-margin-small"><span uk-icon="icon:  triangle-right"></span> Sales Process</li>
         <li class="uk-margin-small"><span uk-icon="icon:  triangle-right"></span> Debt Process</li>
         <li class="uk-margin-small"><span uk-icon="icon:  triangle-right"></span> Credit Process  </li>
         <li class="uk-margin-small"><span uk-icon="icon:  triangle-right"></span> Stock Management</li>
         <li class="uk-margin-small"><span uk-icon="icon:  triangle-right"></span> Standart Report</li>
       </ul>
      <div class="uk-position-bottom uk-position-small">
        <hr>
        <a href="http://wa.me/{{$wa}}?text=kak, mau pesan Aplikasi fercova X5 yang small company bisa?" title="Explore more" class="uk-button uk-button-default uk-margin-medium-top" style="width:260px;"> Order Now</a>
      </div>
     </div>
   </div>
   
  <div class="uk-position-relative  uk-margin-medium-top" style="min-height:700px">
     <div class="uk-card uk-padding-small uk-card-default uk-card-hover uk-border-rounded  " style="background: #1863C6;color:white;">
       <h3 class="uk-text-bold uk-margin-medium-top x-white-text">standart company</h3>
       <p class="">IDR 2.500.000</p>
       <hr>
       <ul class="uk-text-left uk-margin-medium-top uk-padding-small">
        <li class="uk-margin-small"><span uk-icon="icon:  triangle-right"></span> Purchace Process</li>
        <li class="uk-margin-small"><span uk-icon="icon:  triangle-right"></span> Sales Process</li>
        <li class="uk-margin-small"><span uk-icon="icon:  triangle-right"></span> Debt Process</li>
        <li class="uk-margin-small"><span uk-icon="icon:  triangle-right"></span> Credit Process  </li>
        <li class="uk-margin-small"><span uk-icon="icon:  triangle-right"></span> Stock Management</li>
        <li class="uk-margin-small"><span uk-icon="icon:  triangle-right"></span> Standart Report</li>
        <li class="uk-margin-small"><span uk-icon="icon:  triangle-right"></span> Profit and Loss report</li>
       </ul>
       <div class="uk-position-bottom uk-position-small">
        <hr>
        <a href="http://wa.me/{{$wa}}?text=kak, mau pesan Aplikasi fercova X5 yang standart company bisa?" title="Explore more" class="uk-button uk-button-default uk-margin-medium-top" style="width:260px;"> Order Now</a>
      </div>
     </div>
   </div>
   
  <div class="uk-margin-medium-top uk-position-relative" style="min-height:700px">
     <div class="uk-card uk-padding-small uk-card-default uk-card-hover">
       <h3 class="uk-text-bold uk-margin-medium-top">Medium company</h3>
       <p class="uk-text-meta">IDR 4.500.000</p>
       <hr>
       <ul class="uk-text-left uk-margin-medium-top uk-padding-small">
        <li class="uk-margin-small"><span uk-icon="icon:  triangle-right"></span> Purchace Process</li>
        <li class="uk-margin-small"><span uk-icon="icon:  triangle-right"></span> Sales Process</li>
        <li class="uk-margin-small"><span uk-icon="icon:  triangle-right"></span> Debt Process</li>
        <li class="uk-margin-small"><span uk-icon="icon:  triangle-right"></span> Credit Process  </li>
        <li class="uk-margin-small"><span uk-icon="icon:  triangle-right"></span> Stock Management</li>
        <li class="uk-margin-small"><span uk-icon="icon:  triangle-right"></span> Standart Report</li>
        <li class="uk-margin-small"><span uk-icon="icon:  triangle-right"></span> Profit and Loss report</li>
        <li class="uk-margin-small"><span uk-icon="icon:  triangle-right"></span> Balance Sheet</li>
       </ul>
       <div class="uk-position-bottom uk-position-small" >
        <hr>
        <a href="http://wa.me/{{$wa}}?text=kak, mau pesan Aplikasi fercova X5 yang medium company bisa?" title="Explore more" class="uk-button uk-button-default uk-margin-medium-top" style="width:260px;"> Order Now</a>
      </div>
     </div>
   </div>
   
  
   
  <div class="uk-margin-medium-top uk-position-relative" style="min-height:700px">
     <div class="uk-card uk-padding-small uk-card-default uk-card-hover">
       <h3 class="uk-text-bold uk-margin-medium-top">Big company</h3>
       <p class="uk-text-meta">IDR 7.500.000 / branch</p>
       <hr>
       <ul class="uk-text-left uk-margin-medium-top uk-padding-small">
        <li class="uk-margin-small"><span uk-icon="icon:  triangle-right"></span> Purchace Process</li>
        <li class="uk-margin-small"><span uk-icon="icon:  triangle-right"></span> Sales Process</li>
        <li class="uk-margin-small"><span uk-icon="icon:  triangle-right"></span> Debt Process</li>
        <li class="uk-margin-small"><span uk-icon="icon:  triangle-right"></span> Credit Process  </li>
        <li class="uk-margin-small"><span uk-icon="icon:  triangle-right"></span> Stock Management</li>
        <li class="uk-margin-small"><span uk-icon="icon:  triangle-right"></span> Standart Report</li>
        <li class="uk-margin-small"><span uk-icon="icon:  triangle-right"></span> Profit and Loss report</li>
        <li class="uk-margin-small"><span uk-icon="icon:  triangle-right"></span> Balance Sheet</li>
        <li class="uk-margin-small"><span uk-icon="icon:  triangle-right"></span> Multi Branch</li>

       </ul>
       <div class="uk-position-bottom uk-position-small">
        <hr>
        <a href="http://wa.me/{{$wa}}?text=kak, mau pesan Aplikasi fercova X5 yang big company bisa?" title="Explore more" class="uk-button uk-button-default uk-margin-medium-top" style="width:260px;"> Order Now</a>
      </div>
     </div>
   </div>
   
  

 </div>
</section>

<div class="uk-width-auto@m uk-width-1-1 uk-padding uk-text-center uk-flex uk-flex-column uk-margin-large-top">
  <h3 class="uk-text-bold uk-uppercase ">Do you want create customize application? </h3>
  <p class="uk-align-center  uk-margin-remove-vertical" style="max-width:600px">If you need some customize applcation to your bussiness. <br> <b class="x-color-red-text">Call Us</b>  We sure can create it for you. </b> </p>
  <a href="http://wa.me/{{$wa}}?text=kak, mau buat applikasi custome bisa?" title="Explore more" class="uk-button uk-align-center uk-button-default uk-margin-medium-top" style="width:260px;">Whatsapp Us</a>
</div>

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