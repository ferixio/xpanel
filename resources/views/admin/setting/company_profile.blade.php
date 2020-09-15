@extends('layouts.app')
@section('content')
@php
    $social_media =  json_decode($data['ST-0007']['isi']);
    $akun_bank =  json_decode($data['ST-0008']['isi']);
@endphp
<p class="uk-text-bold x-font-18 uk-text-capitalize">Pengaturan data perusahaan</p>

<div class="uk-padding uk-box-shadow-small x-font-12">
  <input type="file" name="fl-upload" id="fl-upload" class="uk-hidden" accept="image/*">
  <form id="form-setting" method="POST">
    @csrf
    <div class="dropzone uk-margin-small uk-flex uk-flex-middle uk-child-width-auto"> 
      <div id="x-drop"  class="uk-text-center uk-padding-small" style="height: 150px !important;width:150px !important"> 
        <span uk-icon="icon:  cloud-upload"></span>
        Logo perusahaan  <span id="trigger-upload"  style="cursor:pointer"><b>Pilih</b></span>
      </div>
      <div id="preview" class="uk-margin-small-left" uk-lightbox="animation: slide">

        <div id="" class=" uk-flex uk-flex-middle uk-flex-column uk-text-left" data-value="{{ $data['ST-0000']['isi']}}">
          <a href="{{ $data['ST-0000']['isi']}}" data-caption="" class="uk-inline" data-type="image">    
              <div class="preview-img uk-box-shadow-small uk-inline-clip  uk-transition-toggle" tabindex="0" uk-img data-src="{{ $data['ST-0000']['isi']}}">
                  
              </div>
          </a>
       
        </div>
      </div>
      
      <input type="hidden" name="logo" id="logo">
     
    </div>
    <hr>
    <p class="uk-text-bold x-font-16 uk-margin-remove">Data perusahaan</p>
    <p class="uk-text-meta uk-margin-remove">Lengkapi data perusahaan anda dibawah ini.</p>
    <div class="uk-child-width-1-2@m uk-padding uk-margin-small-top uk-padding-remove-vertical" uk-grid>
      <div>
        <div>
          <label for="" class="">Nama perusahaan</label>
          <input type="text" name="nama-perusahaan" class="uk-input" placeholder="masukan nama perusahaan disini" value="{{ $data['ST-0001']['isi']}}">
        </div>
        <div>
          <label for="" class="">Handphone</label>
          <input type="tel" name="handphone" class="uk-input" placeholder="masukan nomor handphone perusahaan disini"value="{{ $data['ST-0004']['isi']}}">
        </div>
        <div>
          <label for="" class="">Handphone 2</label>
          <input type="tel" name="handphone2" class="uk-input" placeholder="masukan nomor handphone lainnya"value="{{ $data['ST-0005']['isi']}}">
        </div>
        <div>
          <label for="" class="">Email</label>
          <input type="email" name="email" class="uk-input" placeholder="masukan email perusahaan anda disini"value="{{ $data['ST-0003']['isi']}}">
        </div>
        
      </div>
      <div>
        <div>
          <label for="" class="">Telp. kantor</label>
          <input type="tel" name="telp" class="uk-input" placeholder="masukan telp kantor perusahaan disini"value="{{ $data['ST-0006']['isi']}}">
        </div>
        <div>
          <label for="">Alamat</label> <br>
          <textarea name="alamat" id="" style="width:100%;height:100px;padding:10px !important">{{ $data['ST-0002']['isi']}}</textarea>
        </div>
        <div>
          <label for="" class="">Link google maps</label>
          <input type="text" name="maps" class="uk-input" placeholder="masukan link google maps disini"value="{{ $data['ST-0009']['isi']}}">
        </div>
      </div>
    </div>
    <hr>
    <p class="uk-text-bold x-font-16 uk-margin-remove">Akun social media</p>
    <p class="uk-text-meta uk-margin-remove">Masukan link social media anda dibawah ini.</p>
    <div class="uk-margin-small-top">
      <div class="uk-flex uk-flex-column">
        <label for="">facebook</label>
        <div class="uk-inline">
          <span class="uk-form-icon" uk-icon="icon: facebook"></span>
          <input class="uk-input" name="social-media[fb]" value="{{ is_null($social_media) ? '' : $social_media->fb }}">
        </div>
      </div>
      <div class="uk-flex uk-flex-column">
        <label for="">instagram</label>
        <div class="uk-inline">
          <span class="uk-form-icon" uk-icon="icon: instagram"></span>
          <input class="uk-input" name="social-media[ig]" value="{{is_null($social_media) ? '' : $social_media->ig }}">
        </div>
      </div>
      <div class="uk-flex uk-flex-column">
        <label for="">google+</label>
        <div class="uk-inline">
          <span class="uk-form-icon" uk-icon="icon: google"></span>
          <input class="uk-input" name="social-media[gplus]" value="{{is_null($social_media) ? '' : $social_media->gplus }}">
        </div>
      </div>
      <div class="uk-flex uk-flex-column">
        <label for="">Youtube</label>
        <div class="uk-inline">
          <span class="uk-form-icon" uk-icon="icon: youtube"></span>
          <input class="uk-input" name="social-media[yt]" value="{{is_null($social_media) ? '' : $social_media->yt }}">
        </div>
      </div>
      <div class="uk-flex uk-flex-column">
        <label for="">twitter</label>
        <div class="uk-inline">
          <span class="uk-form-icon" uk-icon="icon: twitter"></span>
          <input class="uk-input" name="social-media[tw]" value="{{is_null($social_media) ? '' : $social_media->tw }}">
        </div>
      </div>
    </div>
    <hr>
    <p class="uk-text-bold x-font-16 uk-margin-remove">Akun Bank</p>
    <p class="uk-text-meta uk-margin-remove">Masukan akun bank anda dibawah ini ( untuk ditampilkan di invoice tagihan ).</p>
    <div>
      <div>
        <label for="">Bank BCA</label>
        <div class="uk-child-width-1-1  uk-flex  uk-grid  uk-padding uk-padding-remove-vertical">
          <input type="number" class="uk-input"  name="akun-bank[bank_bca][nomor]" placeholder="Nomor rekening"  value="{{!is_null($akun_bank) ? $akun_bank->bank_bca->nomor : ''}}" >
          <input type="text" class="uk-input " name="akun-bank[bank_bca][name]" placeholder="Nama lengkap di rekening ini" value="{{!is_null($akun_bank) ? $akun_bank->bank_bca->name : ''}}">
        </div>
      </div>
      <div>
        <label for="">Bank BNI</label>
        <div class="uk-child-width-1-1  uk-flex  uk-grid  uk-padding uk-padding-remove-vertical">
          <input type="number" class="uk-input"  name="akun-bank[bank_bni][nomor]" placeholder="Nomor rekening"  value="{{!is_null($akun_bank) ? $akun_bank->bank_bni->nomor : ''}}" >
          <input type="text" class="uk-input " name="akun-bank[bank_bni][name]" placeholder="Nama lengkap di rekening ini" value="{{!is_null($akun_bank) ? $akun_bank->bank_bni->name : ''}}">
        </div>
      </div>
      <div>
        <label for="">Bank Mandiri</label>
        <div class="uk-child-width-1-1  uk-flex  uk-grid  uk-padding uk-padding-remove-vertical">
          <input type="number" class="uk-input"  name="akun-bank[bank_mandiri][nomor]" placeholder="Nomor rekening"  value="{{!is_null($akun_bank) ? $akun_bank->bank_mandiri->nomor : ''}}" >
          <input type="text" class="uk-input " name="akun-bank[bank_mandiri][name]" placeholder="Nama lengkap di rekening ini" value="{{!is_null($akun_bank) ? $akun_bank->bank_mandiri->name : ''}}">
        </div>
      </div>
      <div>
        <label for="">Bank BRI</label>
        <div class="uk-child-width-1-1  uk-flex  uk-grid  uk-padding uk-padding-remove-vertical">
          <input type="number" class="uk-input"  name="akun-bank[bank_bri][nomor]" placeholder="Nomor rekening"  value="{{!is_null($akun_bank) ? $akun_bank->bank_bri->nomor : ''}}" >
          <input type="text" class="uk-input " name="akun-bank[bank_bri][name]" placeholder="Nama lengkap di rekening ini" value="{{!is_null($akun_bank) ? $akun_bank->bank_bri->name : ''}}">
        </div>
      </div>
      <div>
        <label for="">Bank OVO</label>
        <div class="uk-child-width-1-1  uk-flex  uk-grid  uk-padding uk-padding-remove-vertical">
          <input type="number" class="uk-input "  name="akun-bank[ovo][nomor]" placeholder="Nomor rekening"  value="{{!is_null($akun_bank) ? $akun_bank->ovo->nomor : ''}}" >
          <input type="text" class="uk-input " name="akun-bank[ovo][name]" placeholder="Nama lengkap di rekening ini" value="{{!is_null($akun_bank) ? $akun_bank->ovo->name : ''}}">
        </div>
      </div>
      
     
     

    </div>
    <button class="uk-button uk-button-default uk-margin-medium-top">Simpan Data</button>
  </form>
</div>
<script>
  document.addEventListener('DOMContentLoaded',()=>{
    
  var preview         = document.querySelector('#preview');
  var dropZone        = document.querySelector('#x-drop');

    if ('{{session("proses_simpan")}}' == '1') {
      UIkit.modal.alert('Data telah tersimpan')
    }

    $('#fl-upload').change(function (e) {  
      previewFile(e.target.files , 'local');
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
  

    function previewFile(newFile , source){
      
      if(newFile.length > 0){
          
          var x = 1;
          Array.from(newFile).forEach((file)=>{
              var reader =  new FileReader()
              reader.onloadend = ()=>{
                
                  if (file.type.match('image.*')) {
                    
                    compressImage(reader.result).then((result)=>{
                      var html = preview.innerHTML;
                      $('#logo').val(result);
                     
                      html=`
                      <div id="${file.name}" class=" uk-flex uk-flex-middle uk-flex-column uk-text-left" data-value="${result}">
                          <a href="${result}" data-caption="${file.name}" class="uk-inline" data-type="image">    
                              <div class="preview-img uk-box-shadow-small uk-inline-clip  uk-transition-toggle" tabindex="0" uk-img data-src="${result}">
                                  <div class="uk-transition-fade uk-border-circle  uk-position-center  uk-overlay-default x-padding-5">
                                      <span class="btn-del-preview uk-text-danger uk-transition-fade" uk-icon="icon: close;ratio :1.5"></span>
                                  </div>
                              </div>
                          </a>
                       
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
   
  });
</script>
@endsection