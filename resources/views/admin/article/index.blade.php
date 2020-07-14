@extends('layouts.app')
@section('content')
@php

$page_category = 'article';
if (Request::segment(2) == 'product') {
  $page_category= 'product';
}
@endphp

<h4 class="uk-text-bold uk-text-capitalize">Page of  {{ $page_category }}</h4>
 @csrf

  <div class="uk-grid-small uk-child-width-1-2@l uk-flex uk-flex-middle" uk-grid>
    <form action="{{ url('xpanel/article/') }}" method="GET" class="uk-search uk-search-default">
      <button type="submit" class="uk-search-icon-flip" uk-search-icon></button>
      <input id="keyword" name="keyword" class="uk-search-input" type="search" placeholder="Search ..." value="{{ $keyword }}">
    </form>
    <div>
      <ul class="uk-iconnav uk-child-width-expand uk-text-center uk-padding uk-padding-remove-vertical">
        <li><a href="{{ url("xpanel/$page_category/create") }}" id="btn-add" href="#" uk-icon="icon: plus" uk-tooltip="title: Add New"  ></a></li>
        <li><a id="btn-grid" href="#" uk-icon="icon: thumbnails" uk-tooltip="title: Grid view"></a></li>
        <li><a id="btn-list" href="#" uk-icon="icon: menu" uk-tooltip="title: List view"></a></li>
        <li><a id="sort-asc" href="" uk-icon="icon: pull" uk-tooltip="title: Sortir A-Z"></a></li>
        <li><a  id="sort-desc"  href="#" uk-icon="icon: push" uk-tooltip="title: Sortir Z-A"></a></li>
        <li><a  id="delete-batch" class="uk-text-danger"  href="#" uk-icon="icon: trash" uk-tooltip="title: Delete data on selection"></a></li>
        {{-- <li><a href="#" uk-icon="icon: file-text" uk-tooltip="title: Export Data"></a></li> --}}
      </ul>
    </div>
</div>

<div id="x-grid" class="uk-flex uk-child-width-1-1 uk-grid-small uk-padding uk-grid-match" uk-grid>

    @forelse ($data as $content)
        <div>
          <div class="x-grid-item  uk-box-shadow-small x-list uk-flex uk-flex-middle  uk-transition-toggle uk-position-relative" tabindex="0">
            
            <input type="checkbox" name="cek-{{ $content['id']}}" data_id="{{ $content['id']}}" data-class="cek-content" class="uk-position-top-left" style="margin: 10px 0 0 10px !important;">
            <div  style="height:100px;width:100px;background-image:url({{ is_null($content['image_thumb']) || empty($content['image_thumb']) ? asset('images/photo.svg')  : asset('storage/'.$content['image_thumb']) }});background-size:cover;" class="uk-border-rounded uk-margin uk-width-auto"></div>

            <div class="x-grid-desc uk-margin-medium-left  uk-width-expand">
              <p class="uk-text-capitalize x-font-16 uk-width-expand uk-text-bold  uk-margin-remove">{{ $content['title']}}</p>
              <p class="uk-text-meta x-font-12  uk-margin-remove "> 
                {!! '<br>by <b>'. $content['publisher'].'</b><br><span class="x-font-10">'.date_format(date_Create($content['created_at']),'d-M-Y H:i').'</span>'!!} </p>

                
            </div>
            <ul class="x-grid-icon uk-iconnav uk-iconnav-vertical">
              <li><a id="duplicate-{{ $content['id'] }}" class="btn-duplicate uk-transition-slide-right" uk-icon="icon: copy" uk-tooltip="title: Duplicate data" ></a></li>
              <li><a class="btn-edit uk-transition-slide-right x-transition-delay-2" href="{{ url('xpanel/'.$page_category.'/'.$content['id'].'/edit') }}" uk-icon="icon: file-edit" uk-tooltip="title: Edit data"></a></li>
              <li><a class="btn-view uk-transition-slide-right x-transition-delay-4 x-icon-24 x-icon-eye" target="_blank"  href="{{ url('view/'.$content['slug']) }}" uk-tooltip="title: View on publish"></a></li>
              <li><a id="{{ $content['id'] }}" class="btn-hapus uk-transition-slide-right x-transition-delay-6" href="#" uk-icon="icon: trash" uk-tooltip="title: Delete data"></a></li>
            </ul>
          </div>
        </div>
    @empty
        <div class="x-font-20 uk-width-1-1 uk-background-muted  uk-text-center"><p class="uk-padding">{{ $page_category == 'article' ? 'Article' : 'Product' }} not found</p></div>
    @endforelse
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

  <div id="modal-duplicate" uk-modal>
    <div class="uk-modal-dialog">
      <button class="uk-modal-close-default" type="button" uk-close></button>
      
      <div class="uk-modal-body">
        Do you want duplicate this data with image?
      </div>
      <div class="uk-modal-footer">
        <form id="form-duplicate" action="#" method="post" class="uk-align-right">
          @csrf
          @method('PUT')
          <input type="hidden" id="txt-with-image" name="txt-with-image" value="">
          
          <button type="submit" class="uk-button uk-button-default" onclick="duplicate('with')">With Image</button>
          <button type="submit" class="uk-button uk-button-default" onclick="duplicate('not-with')">Not With Image</button>
        </form>
      </div>
    </div>
  </div>
  <script>
    
    let url = `{{ url('xpanel/'.$page_category) }}`;
    $('#sort-asc').click(function (e) { 
      e.preventDefault();
      window.location.href = `{{ url('xpanel/'.$page_category) }}?keyword=${$('#keyword').val()}&sort=asc&paginate=${$('#count').val()}`
    });

    $('#sort-desc').click(function (e) { 
      e.preventDefault();
      window.location.href = `{{ url('xpanel/'.$page_category) }}?keyword=${$('#keyword').val()}&sort=desc&paginate=${$('#count').val()}`
    });

    $('#count').change(function (e) { 
      e.preventDefault();
      window.location.href = `{{ url('xpanel/'.$page_category) }}?keyword=${$('#keyword').val()}&sort=desc&paginate=${$('#count').val()}`
    });

    $('.btn-duplicate').click(function (e) { 
      e.preventDefault();
      var id = this.id.replace(/duplicate-/gi , '');
      $('#id-content').val(id);
      $('#form-duplicate').attr('action', `{{url('xpanel/'.$page_category)}}/${id}`);
      UIkit.modal('#modal-duplicate').show();
    });

    function duplicate(w){
      $('#txt-with-image').val(w);
    }

    $('#delete-batch').click(function (e) { 
      e.preventDefault();
      UIkit.modal.confirm('Do you want to delete all selection data?').then(()=>{
        var els = document.querySelectorAll('input[data-class=cek-content]:checked');
        var id = [];
        var hash = $('input[name=_token]').val();
        Object.keys(els).forEach(el => {
          id.push($(els[el]).attr('data_id'));
        });
        var idFirst = id[0];
        $.ajax({
          type: 'DELETE',
          url: url +`/${idFirst}` ,
          data: {'_token':hash , data: id },
          dataType: 'JSON',
          success: function (response) {
            UIkit.modal.alert('<h5 class="uk-text-success x-font-14"><b>Data was deleted</b></h5>');
          }
        });

        setTimeout(() => {
            window.location.reload();
        }, 1200);

      })
    });


    $('.btn-hapus').click(function (e) { 
      e.preventDefault();

      UIkit.modal.confirm('Do you want to delete this data?').then(()=>{
        var hash = $('input[name=_token]').val();
        
        $.ajax({
          type: 'DELETE',
          url: url +'/'+this.id,
          data: {'_token':hash},
          dataType: 'JSON',
          success: function (response) {
            UIkit.modal.alert('<h5 class="uk-text-success x-font-14"><b>Data was deleted</b></h5>');
          }
        });

        setTimeout(() => {
            window.location.reload();
        }, 1200);
      });
    });

  </script>
@endsection