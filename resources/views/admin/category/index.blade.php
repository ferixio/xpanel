@extends('layouts.app')
@section('content')

  @php

    $page_category = 'Article';
    $edit = '';
    request()->segment(4) == 'edit' ? $edit = 'edit' : '';
   
    if (Request::segment(2) == 'category-product') {
      $page_category= 'Product';
    }
    $id_selected = '0';
    if (Session::has('category')) {
      $id_selected = Session::get('category')->id_parent;
    }
    if ($edit =='edit') {
      $str_pos = strpos($category['id_parent'] , '|');
      $id_selected =  substr($category['id_parent'] , 0,$str_pos);
      $id_selected == '' ? $id_selected = 0 : $id_selected;
    }

  @endphp
 
 <div class="uk-child-width-1-1 uk-align-center" uk-grid style="max-width:550px;">
  <h4 class="uk-text-bold uk-padding-remove-horizontal">{{$edit == 'edit' ? 'Edit ' : 'Add New'}} Category</h4>
    <div>
      <form action="{{url('xpanel/'.Request::segment(2))}}" method="POST" class="uk-search uk-search-default uk-width-1-1">
        @csrf
        <input type="hidden" name="id" value="{{$edit == 'edit' ? $category['id'] : ''}}">
        <input type="hidden" name="jenis_proses" value="{{$edit == 'edit' ? 'edit' : 'add'}}">
        <div class="uk-position-relative">
          <input id="name" name="name" class="uk-search-input" type="search" placeholder="Enter New Category" autofocus value="{{$edit == 'edit' ? $category['name'] : ''}}">
          {{-- <button type="submit" class="uk-search-icon-flip" uk-search-icon="icon: plus" ></button> --}}
        </div>
        <p id="err-name" class="x-font-12 x-nomargin uk-text-danger  x-error">@error('name'){{$message}}@enderror</p>
        <div class="uk-width-1-1 uk-child-widt-1-1 uk-margin-small x-font-14">
          <div class="x-font-12">Choose parent of category</div>
          <select class="uk-select uk-input " name="id_parent"  id="id_parent" style="width:100%;padding:15px 5px !important;">
            <option></option>
            <option value="0" {{ count($data) == 0 || $id_selected == '0'  ? 'selected'  : ''}}>Main Category</option>
            
            @foreach ($data as $category)
              <option value="{{$category['id']}}"  {{  $id_selected == $category['id']  ? 'selected'  : ''}} >{{$category['name']}}</option>
            @endforeach

          </select>
        </div>
        @if ($edit == 'edit')
          
          <button class="uk-button uk-button-default uk-margin" type="button" onclick="window.history.back()">Back</button>
        @endif
        <button class="uk-button uk-button-default uk-margin" type="submit">Save</button>
      </form>
    
      
    </div>
   @if ( $edit !== 'edit')
    <h4 class="uk-text-bold uk-padding-remove uk-margin-small">List Category of {{$page_category}}</h4>
    <div class="uk-padding uk-padding-remove-vertical uk-box-shadow-small uk-margin-remove">
      <div id="list-category" class=" uk-padding "></div>
    </div>
   @endif
   

  </div>

  <div id="modal-delete" uk-modal>
    <div class="uk-modal-dialog">
      <button class="uk-modal-close-default" type="button" uk-close></button>
      
      <div class="uk-modal-body">
        Do you want to delete this {{$page_category}}?
      </div>
      <div class="uk-modal-footer">
        <form id="form-delete" action="#" method="post" class=" uk-align-right">
          @csrf
          @method('DELETE')
          <button class="uk-button uk-button-default" onclick="UIkit.modal('#modal-delete').hide()" type="button">Cancel</button>
          <button class="uk-button uk-button-default" type="submit">Delete</button>
        </form>
      </div>
    </div>
  </div>

 
 
  <link rel="stylesheet" href="{{asset('vendor/select2/css/select2.min.css')}}">
  <script src="{{asset('vendor/select2/js/select2.full.min.js')}}"></script>
  <script>
   document.addEventListener('DOMContentLoaded',()=>{
    var categories = JSON.parse('{!! json_encode($data) !!}');
    initCategory();
    
    $('#id_parent').select2({
      placeholder: 'Choose parent category'
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
                <span uk-icon="icon:    pencil" class="btn-edit" style="color:green;cursor:pointer"></span> 
                <span uk-icon="icon:    close" class="uk-text-danger btn-hapus" style="cursor:pointer"></span>
                ${strip} <span class="category-name">${category.name}</span></div>`;
              if ($('#category-'+parent).length) {
                  $('#category-'+parent).append(html);
              }else{
                $('#list-category').append(html);
                
              }
            }else{
              html +=`<div id="category-${category.id}" class="uk-margin-small category">
                <span uk-icon="icon: pencil" class="btn-edit" style="color:green;cursor:pointer"></span> 
                <span uk-icon="icon:    close" class="uk-text-danger btn-hapus" style="cursor:pointer"></span>
                ${strip} <span class="uk-text-bold">${category.name}</span>   </div>`;
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
    
    
  });


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

  </script>
@endsection