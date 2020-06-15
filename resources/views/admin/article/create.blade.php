@extends('layouts.app')
@section('content')
<style>
  body{
    font-family:-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji" !important;
  }
  </style>
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
      
      <label for="" class="uk-text-bold x-font-12">Deskripsi lengkap tentang {{ $page_category}}</label>
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
      
      <div class="uk-margin">
        <img id="x-thumb" src="{{ $edit == true ?  asset('storage/'.$content['image_path']) : ''}}" alt="" class="x-thumb" width="100px">   
        <div>
          <div class="uk-text-bold x-font-14">Pilih file gambar sebagai thumbnails</div>
          <input type="file" name="image_path" id="image_path" accept="image/*">
          <p id="err-image_path" class="x-font-12 x-nomargin uk-text-danger  x-error">@error('image_path'){{$message}}@enderror</p> 
        </div>
     </div>
     
     
  
      <button class="uk-button uk-margin x-white-text x-font-14" id="btn-simpan" type="submit">Simpan</button>
    </form>




<link rel="stylesheet" href="{{asset('summernote/summernote-lite.min.css')}}">
<script src="{{asset('summernote/summernote-lite.min.js')}}"></script>

<script>
    let image      = '';
    let content    = `{!! $edit == true ?  $content['description'] : '' !!}`;
    let url        = `{{ url("xpanel/$page_category") }}`;
    let summernote = $('#summernote');
    let hash       = '';
    initThumb();
    summernote.summernote({
            callbacks: {
                onImageUpload: function(files) {
                    for(let i=0; i < files.length; i++) {
                        $.upload(files[i]);
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
        var price = $('#price').val() == '' ? 0 : $('#price').val().replace(/[,]/gi,'');
        var price_promo = $('#price_promo').val() == '' ? 0 : $('#price_promo').val().replace(/[,]/gi,'');
        frmData.append('description', content.replace(/[\u200B-\u200D\uFEFF]/gi ,''));
        frmData.append('proses' , proses);
        frmData.append('price' , price);
        frmData.append('price_promo' , price_promo);

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

      function initThumb(){
          var inputFile = document.querySelector('#image_path');
          
            var img1 = document.querySelector('#x-thumb');
            inputFile.addEventListener('change',(e)=>{
                if (inputFile.value !== ''){
                  var reader = new FileReader()
                  reader.onload=(e)=>{
                    var img =  new Image()
                    img1.src = image =  reader.result
                  }
                  reader.readAsDataURL(inputFile.files[0])
                
                } else {
                  img1.src="";
                }
            });
          }
</script>


@endsection
