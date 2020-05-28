@extends('layouts.app')
@section('content')
  <h5 class="title uk-text-uppercase uk-text-left@l uk-text-center">Bidang Usaha</h5>

  <div class="uk-grid-small uk-child-width-1-2@l uk-flex uk-flex-middle" uk-grid>
      <form class="uk-search uk-search-default">
        <span class="uk-search-icon-flip" uk-search-icon></span>
        <input class="uk-search-input" type="search" placeholder="Pencarian Data ...">
      </form>
      <div>
        <ul class="uk-iconnav uk-child-width-expand uk-text-center uk-padding uk-padding-remove-vertical">
          <li><a id="btn-add" href="#" uk-icon="icon: plus" uk-tooltip="title: Tambah Data"  ></a></li>
          <li><a id="btn-grid" href="#" uk-icon="icon: thumbnails" uk-tooltip="title: Tampilan Grid"></a></li>
          <li><a id="btn-list" href="#" uk-icon="icon: menu" uk-tooltip="title: Tampilan List"></a></li>
          <li><a href="#" uk-icon="icon: pull" uk-tooltip="title: Sortir A-Z"></a></li>
          <li><a href="#" uk-icon="icon: push" uk-tooltip="title: Sortir Z-A"></a></li>
          <li><a href="#" uk-icon="icon: file-text" uk-tooltip="title: Export Data"></a></li>
        </ul>
      </div>
  </div>
  
  {{-- uk-flex uk-child-width-1-1 uk-grid-small uk-padding uk-grid-match --}}

  <div id="x-grid" class="uk-flex uk-child-width-1-1 uk-grid-small uk-padding uk-grid-match" uk-grid>
     @for ($i = 1; $i < 6; $i++)
       <div>
          <div class="x-grid-item uk-box-shadow-small x-list uk-flex uk-flex-middle  uk-transition-toggle" tabindex="0">
            <div>
              <img uk-img data-src="{{asset('/img/office.svg')}}" style="width: 64px; height:64px;" class="x-margin-auto" />
            </div>
            <div class="x-grid-desc uk-margin-medium-left  uk-width-expand">
              <h5 class="uk-text-uppercase uk-margin-remove ">Bidang {{ $i}}</h5>
              <p class="uk-text-meta x-font-12 uk-margin-remove"> Jl. Ahmad yani no 4 <br> Phone (0291) 245 1123</p>
            </div>
            
            <ul class="x-grid-icon uk-iconnav uk-iconnav-vertical">
              <li><a class="btn-edit uk-transition-slide-right" href="#" uk-icon="icon: pencil" uk-tooltip="title: Rubah Data"></a></li>
              <li><a class="btn-hapus uk-transition-slide-right x-transition-delay-2" href="#" uk-icon="icon: close" uk-tooltip="title: Hapus Data"></a></li>
            </ul>
          </div>
       </div>

     @endfor
  </div>
  <hr>

  <div class="uk-padding uk-padding-remove-vertical uk-grid-small uk-flex uk-flex-middle uk-text-center" uk-grid>
    
    <div class="uk-width-auto">
      <form action="#">
        <select name="count" id="count" class="uk-select uk-form-small"  uk-tooltip="title: Jumlah data yang diperlihatkan" style="width:60px">
          <option value="10">10</option>
          <option value="25">25</option>
          <option value="50">50</option>
          <option value="100">100</option>
        </select>
      </form>
    </div>
    <div class="uk-width-expand">
      <ul class="uk-pagination uk-flex-right x-font-12">
        <li><a href="#"><span uk-pagination-previous></span></a></li>
        <li><a href="#">1</a></li>
        <li class="uk-disabled"><span>...</span></li>
        
        <li><a href="#">6</a></li>
        <li class="uk-active"><span>7</span></li>
        <li><a href="#">8</a></li>
        <li class="uk-disabled"><span>...</span></li>
        <li><a href="#">20</a></li>
        <li><a href="#"><span uk-pagination-next></span></a></li>
    </ul>
    </div>
  </div>


 <div id="modal-dialog" uk-modal>
   <div class="uk-modal-dialog">
     <button class="uk-modal-close-default x-white-text" type="button" uk-close></button>
     <div class="uk-modal-header">
       <h4 id="modal-title" class="uk-modal-title x-color-theme-text x-font-14 uk-text-capitalize uk-text-bold">Tambah Data</h4>
     </div>
     <div class="uk-modal-body" >
       <form class="uk-form-stacked">
         <div class="uk-margin">
           <div class="uk-form-controls">
            <label class="uk-form-label">Nama Bidang Usaha</label>
             <input type="text" class="uk-input" placeholder="masukan nama bidang usaha">
           </div>
         </div>
         <div class="uk-margin">
           <div class="uk-form-controls">
            <label class="uk-form-label">Kepala Bidang Usaha</label>
            <input type="text" class="uk-input" placeholder="masukan nama kepala bidang usaha">
          </div>
         </div>
         <div class="uk-margin">
           <div class="uk-form-controls">
            <label class="uk-form-label">Alamat</label>
            <input type="text" class="uk-input" placeholder="masukan alamat bidang usaha">
          </div>
         </div>
         <div class="uk-margin">
           <div class="uk-form-controls">
            <label class="uk-form-label">Telp Kantor</label>
            <input type="text" class="uk-input" placeholder="masukan nomor telp kantor">
          </div>
         </div>
       </form>
     </div>
     <div class="uk-modal-footer">
       <button class="uk-button uk-button-default x-white-text"> Simpan Data</button>
     </div>
   </div>
 </div>

@endsection