@extends('layouts.app')
@section('content')

  @php
      $edit = false;
      $categoryChecked = '';
      if ( Request::segment(4) == 'edit') {
        $edit = true;
        $categoryChecked = $content['category'];

      }
      $id_selected = '0';


      $page_category = 'article';
      if (Request::segment(2) == 'product') {
        $page_category= 'product';
      }
  @endphp
  
  <h4  class="uk-text-bold uk-margin-remove-top uk-text-capitalize" >{{ $edit == true ? 'Edit' : 'New'}} {{ $page_category }}</h4>
  <form id="form-berita" enctype="multipart/form-data" accept-charset='utf-8-sig'>
      @csrf
      <input type="hidden" name="id" value="{{ $edit == true ?  $content['id'] : ''}}">
      <div class="dropzone uk-margin-small"> 
        <div id="preview" class="uk-child-width-1-2@xs uk-child-width-1-4@m uk-flex uk-flex-center uk-child-width-1-2 uk-padding-small uk-padding-remove-horizontal" uk-grid uk-lightbox="animation: slide"></div>
          <div id="x-drop"  class="uk-text-center x-font-14"> 
            <span uk-icon="icon:  cloud-upload"></span>
            Drop image in here or  <span id="trigger-upload"  style="cursor:pointer"><b>Click Here</b></span></div>
          
          
      </div>
      <input type="text" class="uk-input" id="title" name="title" placeholder="Enter {{ $page_category == 'article' ? 'title of article ' : ' name of product ' }} in here"  required value="{{ $edit == true ?  $content['title'] : ''}}">
      <p id="err-title" class="x-font-12 x-nomargin uk-text-danger  x-error">@error('title'){{$message}}@enderror</p>
      
     
      <textarea name="short_description" id="short_description"  class="uk-width-1-1 uk-padding-small"  rows="3"  class="uk-placeholder"  placeholder="Enter short description in here" maxlength="150">{{ $edit == true ?  $content['short_description'] : ''}}</textarea>
      <p id="err-short_description" class="x-font-12 x-nomargin uk-text-danger  x-error">@error('short_description'){{$message}}@enderror</p>
      
      <label for="" class=" x-font-12">Write full description of {{ $page_category}} in below</label>
      <div  id="summernote"></div>


      @if ($page_category == 'product')
            <div class="uk-margin uk-flex uk-child-width-1-2@m" >
              <div>
                <label for="" class="x-font-12 ">Price of Product</label>
                <input type="text" class="uk-input angka" id="price" name="price" placeholder="Price"  value="{{ $edit == true ?  $content['price'] : 0}}" >
                  <p id="err-price" class="x-font-12 x-nomargin uk-text-danger  x-error">@error('price'){{$message}}@enderror</p>
              </div>
              <div class="uk-margin-small-left">
                <label for="" class="x-font-12 ">Price Promo</label>
                <input type="text" class="uk-input angka" id="price_promo" name="price_promo" placeholder="Price Promo"  value="{{ $edit == true ?  $content['price_promo'] : 0}}" >
                  <p id="err-price_promo" class="x-font-12 x-nomargin uk-text-danger  x-error">@error('price_promo'){{$message}}@enderror</p>
              </div>

            </div>

      @endif
      <div class="uk-child-width-1-2@m uk-grid-small uk-padding-small" uk-grid>
        <div>
          <div class="uk-width-1-1 uk-child-widt-1-1 uk-margin-small x-font-14">
            <div class="x-font-12 uk-margin-small-bottom">Choose category</div>
            <div class="uk-box-shadow-small uk-margin-remove uk-overflow-auto" style="height:300px !important;">
              <div id="list-category" class=" uk-padding-small "></div>
            </div>

          </div>
          
        </div>
        <div class="uk-flex uk-flex-column">
            <label for="" class="x-font-12">Enter Hastag in below <span  class="uk-text-italic" >( separate each tag with this sign # )</span></label>
            <textarea class="uk-padding-small" id="tags" name="tags" placeholder="#Hastag" style="height:272px">{{ $edit == true ?  $content['tags'] : ''}}</textarea>
            <p id="err-tags" class="x-font-12 x-nomargin uk-text-danger  x-error">@error('tags'){{$message}}@enderror</p>

        </div>
      </div>
      <button class="uk-button uk-margin x-white-text x-font-14 uk-align-center uk-align-left@m" id="btn-simpan" type="submit">Save</button>
    </form>
    <input type="file" name="fl-upload[]" id="fl-upload" style="visibility:hidden" multiple accept="image/*">

    




<link rel="stylesheet" href="{{asset('summernote/summernote-lite.min.css')}}">
<script src="{{asset('summernote/summernote-lite.min.js')}}"></script>

<script>

  var image           = '';
  var content         = `{!! $edit == true ?  $content['description'] : '' !!}`;
  var pageCategory    = `{{$page_category}}`;
  var edit            = `{{$edit}}`;
  var url             = `{{ url("xpanel/$page_category") }}`;
  var summernote      = $('#summernote');
  var hash            = '';
  var files           = [];
  var compressImg     = new Blob();
  var preview         = document.querySelector('#preview');
  var dropZone        = document.querySelector('#x-drop');
  var imagePath       = `{!! $edit == true ?  json_encode(explode("|" , $content['image_path'])) : '' !!}` ;
  var categories      = JSON.parse('{!! json_encode($categories) !!}');
  var categoryChecked = JSON.parse(`{!! json_encode(explode('|' , $categoryChecked)) !!}`);
  imagePath !== '' ? imagePath = JSON.parse(imagePath) : '' ; 
  initThumb(imagePath);
  initCategory();
  initChecked();
  

  summernote.summernote({
      callbacks: {
          onImageUpload: function(fileImage) {
              for(let i=0; i < fileImage.length; i++) {
                  $.upload(fileImage[i]);
              }
          },
          
      },
      height: 500,
  });

  $.upload = function (file) {
      let out = new FormData();
      hash = $('input[name=_token]').val();
      out.append('image', file, file.name);
      out.append('_token', hash);

      $.ajax({
          type: 'POST',
          url: `{{ url('xpanel/upload') }}`,
          contentType: false,
          cache: false,
          processData: false,
          data: out,
          success: function (response) {
          
            var res = JSON.parse(response);
            // $('meta[name=tokek]').attr('content' , res.tokek);
            var path_image = `{{url('/')}}/storage/`+res.image;
            summernote.summernote('insertImage', path_image);
          },
          error: function (jqXHR, textStatus, errorThrown) {
              UIkit.notification({message: textStatus + " " + errorThrown , timeout:1200});
          }
      });
  };
      


    summernote.summernote({
      tooltip: false,
      height: 300, 
      toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'underline', 'clear']],
        ['fontname', ['fontname']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['table', ['table']],
        ['insert', ['link', 'picture', 'video']],
        ['view', ['fullscreen', 'codeview', 'help']],
      ]
      
    });
    summernote.summernote('undo');
    summernote.summernote('redo');
    summernote.summernote('code', content);
    summernote.summernote('fontSize', 14);
    $('#title').focus();
    
    
    
    $('#form-berita').submit(function (e) { 

      e.preventDefault();
      var data =  $('#form-berita').serialize(); 
      var content =   summernote.summernote('code');
      var frmData = new FormData(this);
      var proses = `{{ $edit == true ? 'edit' : 'add' }}`;
      var price = price_promo = 0;
      if (pageCategory == 'product') {  
        var price = $('#price').val() == '' ? 0 : $('#price').val().replace(/[,]/gi,'');
        var price_promo = $('#price_promo').val() == '' ? 0 : $('#price_promo').val().replace(/[,]/gi,'');
      }

      frmData.append('description', content.replace(/[\u200B-\u200D\uFEFF]/gi ,''));
      frmData.append('proses' , proses);
      frmData.append('price' , price);
      frmData.append('price_promo' , price_promo);
      files.forEach(file => {
        frmData.append('fl-upload2[]' , file , file.name);
      });
      
      $.ajax({
        method: 'POST',
        url: url,
        data: frmData,
        contentType: false,
        processData: false,
        success: function (response) {
          UIkit.notification({
            message: '<h4>Data was saved</h4>',
            timeout: 1500
        });
        setTimeout(() => {
          location.href = `{{url('xpanel/'.$page_category)}}`;
        }, 1500);
          
        },
        error:()=>{
          UIkit.notification({
            message: '<p class="x-font-14" style="line-height:18px !important;">Error on process saving, please retry again or refresh this page.</p>'
          })
        }
      });
      
    });

    $('#fl-upload').change(function (e) {  
      previewFile(e.target.files , 'local')
    })

    if (document.body.contains(dropZone)) {
      dropZone.ondrop = (e)=>{
        e.preventDefault()
        previewFile(e.dataTransfer.files ,  'local')
      }
      
      dropZone.ondragover = ()=>{
        return false
      }
      
      dropZone.ondragleave = ()=>{
        return false
      }
      $('#trigger-upload').click(()=>{
        $('#fl-upload').trigger('click')
      })
    }

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
                <input id="cek-${category.id}" name="category[]" type="checkbox" value="${category.id}" />
                ${strip} <span class="category-name">${category.name}</span></div>`;
              if ($('#category-'+parent).length) {
                  $('#category-'+parent).append(html);
              }else{
                $('#list-category').append(html);
                
              }
            }else{
              html +=`<div id="category-${category.id}" class="uk-margin-small category">
                <input id="cek-${category.id}" name="category[]" type="checkbox" value="${category.id}" />
                ${strip} <span class="uk-text-bold">${category.name}</span>   </div>`;
              $('#list-category').append(html);
            }
            return false;
          }
          
        });                
      }
      
      
    }

    function initChecked(){
      categoryChecked.forEach(cek => {
            $(`#cek-${cek}`).prop( "checked", true );
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

    function initThumb(images){
      if (images.length > 0 && images[0] !== "") {
               
        var i = 0 ;
        images.forEach(image => {

          urltoFile(`{{asset('storage/')}}/`+image , image , 'image/jpeg')
          .then((file)=>{files.push(file)})
          .then(()=>{
            if (i == images.length - 1) {
              previewFile(files , 'server');
            }
            i++
          });
        });        
      }
    }

    function previewFile(newFile , source){
      
      if(newFile.length > 0){
          
          var x = 1;
          Array.from(newFile).forEach((file)=>{
              var reader =  new FileReader()
              reader.onloadend = ()=>{
                
                  if (file.type.match('image.*')) {
                    
                    compressImage(reader.result).then((result)=>{
                      var html = preview.innerHTML;
                      if (source == 'local') {
                        urltoFile(result , `${file.name}` , `${file.type}`)
                          .then((compressImg)=>{
                            files.push(compressImg);
                          });
                      }
         
                      var checked = '';
                      var fileNameThumb = '';

                      if (source == 'server') {
                        fileNameThumb =  `{{ $edit == true ? $content['image_thumb'] : '' }}`;
                        fileNameThumb == file.name ? checked = 'checked' :  '';
                      }else{
                        if (!$('input[name="image_thumb"]').length) {
                          x == 1 ? checked = 'checked' : '';
                        }
                      }
                      
                      html+=`
                      <div id="${file.name}" class=" uk-flex uk-flex-middle uk-flex-column uk-text-left" data-value="${result}">
                          <a href="${result}" data-caption="${file.name}" class="uk-inline" data-type="image">    
                              <div class="preview-img uk-box-shadow-small uk-inline-clip  uk-transition-toggle" tabindex="0" uk-img data-src="${result}">
                                  <div class="uk-transition-fade uk-border-circle  uk-position-center  uk-overlay-default x-padding-5">
                                      <span class="btn-del-preview uk-text-danger uk-transition-fade" uk-icon="icon: close;ratio :1.5"></span>
                                  </div>
                              </div>
                          </a>
                          <span class=" x-font-12 ">
                            <input type="radio" ${checked} name="image_thumb" value="${file.name}" class=" uk-margin-small-right"  title="choose to be main image">Main Image
                          </span>
                      </div>
                      `

                      preview.innerHTML = html
                      $('.btn-del-preview').click((e)=>{
                          e.preventDefault()
                          var parent = e.currentTarget.parentNode.parentNode.parentNode.parentNode
                          var fileName = $(parent).attr('id');
                          parent.remove()
                          if (files.length >0){
                              for(var i = 0; i < files.length;i++){
                                  if(files[i].name == fileName){
                                      files.splice(i,1)
                                      return
                                  }
                              }
                          }
                          
                      })
                      x++;
                      
                    });
                    
                  }
              }


              reader.readAsDataURL(file)
          })
          
      }
    }


    function dataURLtoBlob(dataurl) {
        var arr = dataurl.split(','), mime = arr[0].match(/:(.*?);/)[1],
            bstr = atob(arr[1]), n = bstr.length, u8arr = new Uint8Array(n);
        while(n--){
            u8arr[n] = bstr.charCodeAt(n);
        }
        return new File([u8arr], {type:mime});
    }

    function urltoFile(url, filename, mimeType){
        return (fetch(url)
            .then(function(res){return res.arrayBuffer();})
            .then(function(buf){return new File([buf], filename,{type:mimeType});})
        );
    }

    function compressImage (base64) {
      const canvas = document.createElement('canvas')
      const img = document.createElement('img')

      return new Promise((resolve, reject) => {
        img.onload = function () {
          let width = img.width
          let height = img.height
          const maxHeight = 1024
          const maxWidth = 1024

          if (width > height) {
            if (width > maxWidth) {
              height = Math.round((height *= maxWidth / width))
              width = maxWidth
            }
          } else {
            if (height > maxHeight) {
              width = Math.round((width *= maxHeight / height))
              height = maxHeight
            }
          }
          canvas.width = width
          canvas.height = height

          const ctx = canvas.getContext('2d')
          ctx.drawImage(img, 0, 0, width, height)

          resolve(canvas.toDataURL('image/jpeg', 0.7))
        }
        img.onerror = function (err) {
          reject(err)
        }
        img.src = base64
      })
    }

</script>


@endsection
