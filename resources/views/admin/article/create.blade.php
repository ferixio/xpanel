@extends('layouts.app')
@section('content')

  @php
      $edit = false;
      if ( Request::segment(4) == 'edit') {
        $edit = true;
      }

      $page_category = 'article';
      if (Request::segment(2) == 'product') {
        $page_category= 'product';
      }
  @endphp
  
  <h4  class="uk-text-bold uk-margin-remove-top uk-text-capitalize" >{{ $edit == true ? 'Perbarui' : 'Buat'}} {{ $page_category }}</h4>
  <form id="form-berita" enctype="multipart/form-data" accept-charset='utf-8-sig'>
      @csrf
     
      <input type="hidden" name="id" value="{{ $edit == true ?  $content['id'] : ''}}">

     
      <input type="text" class="uk-input" id="title" name="title" placeholder="Masukan {{ $page_category == 'article' ? 'judul article / berita ' : ' nama product ' }} disini."  required value="{{ $edit == true ?  $content['title'] : ''}}">
      <p id="err-title" class="x-font-12 x-nomargin uk-text-danger  x-error">@error('title'){{$message}}@enderror</p>
      
     
      <textarea name="short_description" id="short_description"  class="uk-width-1-1 uk-padding-small"  rows="3"  class="uk-placeholder"  placeholder="Masukan deskripsi singkat disini." maxlength="150">{{ $edit == true ?  $content['short_description'] : ''}}</textarea>
      <p id="err-short_description" class="x-font-12 x-nomargin uk-text-danger  x-error">@error('short_description'){{$message}}@enderror</p>
      
      <label for="" class=" x-font-12">Deskripsi lengkap tentang {{ $page_category}}</label>
      <div  id="summernote"></div>


      @if ($page_category == 'product')
        
       
          <div class="uk-margin uk-flex uk-child-width-1-2@m" >

            <div>
              <label for="" class="x-font-12 ">Harga Produk</label>
              <input type="text" class="uk-input angka" id="price" name="price" placeholder="Harga Product"  value="{{ $edit == true ?  $content['price'] : 0}}" >
                <p id="err-price" class="x-font-12 x-nomargin uk-text-danger  x-error">@error('price'){{$message}}@enderror</p>
            </div>
            <div class="uk-margin-small-left">
              <label for="" class="x-font-12 ">Harga Promo</label>
              <input type="text" class="uk-input angka" id="price_promo" name="price_promo" placeholder="Harga Product"  value="{{ $edit == true ?  $content['price_promo'] : 0}}" >
                <p id="err-price_promo" class="x-font-12 x-nomargin uk-text-danger  x-error">@error('price_promo'){{$message}}@enderror</p>
            </div>
  
          </div>

     @endif

      <input type="text" class="uk-input" id="tags" name="tags" placeholder="#Hastag" maxlength="100" value="{{ $edit == true ?  $content['tags'] : ''}}" >
      <p id="err-tags" class="x-font-12 x-nomargin uk-text-danger  x-error">@error('tags'){{$message}}@enderror</p>
      <label for="" class="x-font-12 uk-text-italic">Pisahkan dengan tanda tagar (#) untuk setiap hastag.</label>
     

     <div class="dropzone uk-padding uk-margin-small"> 
          <div id="x-drop"  class="uk-text-center x-font-14"> 
            <span uk-icon="icon:  cloud-upload"></span>
            Tarik gambar kesini atau <span id="trigger-upload"  style="cursor:pointer"><b>Klik disini</b></span></div>
          
          <div id="preview" class="uk-child-width-1-2@xs uk-child-width-1-4@m uk-flex uk-flex-center uk-child-width-1-2 uk-padding uk-padding-remove-horizontal" uk-grid uk-lightbox="animation: slide"></div>
      </div>
      
      
      
      <button class="uk-button uk-margin x-white-text x-font-14 uk-align-center uk-align-left@m" id="btn-simpan" type="submit">Simpan</button>
    </form>
    <input type="file" name="fl-upload[]" id="fl-upload" style="visibility:hidden" multiple accept="image/*">

    




<link rel="stylesheet" href="{{asset('summernote/summernote-lite.min.css')}}">
<script src="{{asset('summernote/summernote-lite.min.js')}}"></script>

<script>

  var image        = '';
  var content      = `{!! $edit == true ?  $content['description'] : '' !!}`;
  var pageCategory = `{{$page_category}}`;
  var edit = `{{$edit}}`;
  console.log(edit)
  var url          = `{{ url("xpanel/$page_category") }}`;
  var summernote   = $('#summernote');
  var hash         = '';
  var files        = [];
  var compressImg  = new Blob();
  var preview      = document.querySelector('#preview');
  var dropZone     = document.querySelector('#x-drop');
  var imagePath = `{!! $edit == true ?  json_encode(explode("|" , $content['image_path'])) : '' !!}` ;
  imagePath !== '' ? imagePath = JSON.parse(imagePath) : '' ; 
  initThumb(imagePath);

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
      
      console.log(files)
      $.ajax({
        method: 'POST',
        url: url,
        data: frmData,
        contentType: false,
        processData: false,
        success: function (response) {
          UIkit.notification({
            message: '<h4>Data berhasil tersimpan</h4>',
            timeout: 1500
        });
        setTimeout(() => {
          location.reload();
        }, 1500);
          
        },
        error:()=>{
          UIkit.notification({
            message: '<p class="x-font-14" style="line-height:18px !important;">Maaf terjadi masalah dalam proses penyimpanan, mohon diulangi lagi atau kalau masih gagal mohon refresh halaman ini.</p>'
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
                        fileNameThumb =  `{{ $content['image_thumb'] }}`;
                        fileNameThumb == file.name ? checked = 'checked' :  '';
                        console.log(fileNameThumb + '  '+ file.name);
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
                            <input type="radio" ${checked} name="image_thumb" value="${file.name}" class=" uk-margin-small-right"  title="Jadikan gambar utama">Gambar utama
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
