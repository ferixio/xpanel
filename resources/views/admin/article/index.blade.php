@extends('layouts.app')
@section('content')
@php

$page_category = 'article';
if (Request::segment(2) == 'product') {
  $page_category= 'product';
}
@endphp

<h4 class="uk-text-bold uk-text-capitalize">Halaman  {{ $page_category }}</h4>
 @csrf

  <div class="uk-grid-small uk-child-width-1-2@l uk-flex uk-flex-middle" uk-grid>
    <form action="{{ url('xpanel/article/') }}" method="GET" class="uk-search uk-search-default">
      <button type="submit" class="uk-search-icon-flip" uk-search-icon></button>
      <input id="keyword" name="keyword" class="uk-search-input" type="search" placeholder="Pencarian Data ..." value="{{ $keyword }}">
    </form>
    <div>
      <ul class="uk-iconnav uk-child-width-expand uk-text-center uk-padding uk-padding-remove-vertical">
        <li><a href="{{ url("xpanel/$page_category/create") }}" id="btn-add" href="#" uk-icon="icon: plus" uk-tooltip="title: Tambah Data"  ></a></li>
        <li><a id="btn-grid" href="#" uk-icon="icon: thumbnails" uk-tooltip="title: Tampilan Grid"></a></li>
        <li><a id="btn-list" href="#" uk-icon="icon: menu" uk-tooltip="title: Tampilan List"></a></li>
        <li><a id="sort-asc" href="" uk-icon="icon: pull" uk-tooltip="title: Sortir A-Z"></a></li>
        <li><a  id="sort-desc"  href="#" uk-icon="icon: push" uk-tooltip="title: Sortir Z-A"></a></li>
        {{-- <li><a href="#" uk-icon="icon: file-text" uk-tooltip="title: Export Data"></a></li> --}}
      </ul>
    </div>
</div>

<div id="x-grid" class="uk-flex uk-child-width-1-1 uk-grid-small uk-padding uk-grid-match" uk-grid>

    @forelse ($data as $content)
        <div>
          <div class="x-grid-item uk-box-shadow-small x-list uk-flex uk-flex-middle  uk-transition-toggle" tabindex="0">
            
            <div  style="height:100px;width:100px;background-image:url({{ is_null($content['image_thumb']) || empty($content['image_thumb']) ? asset('images/photo.svg')  : asset('storage/'.$content['image_thumb']) }});background-size:cover;" class="uk-border-rounded uk-margin uk-width-auto"></div>

            
            
            <div class="x-grid-desc uk-margin-medium-left  uk-width-expand">
              <p class="uk-text-capitalize x-font-16 uk-width-expand uk-text-bold  uk-margin-remove">{{ $content['title']}}</p>
              <p class="uk-text-meta x-font-12  uk-margin-remove "> 
                {!! '<br>Oleh: <b>'. $content['publisher'].'</b><br><span class="x-font-10">'.date_format(date_Create($content['created_at']),'d-M-Y H:i').'</span>'!!} </p>

                
            </div>
            <ul class="x-grid-icon uk-iconnav uk-iconnav-vertical">
              <li><a class="btn-edit uk-transition-slide-right" href="{{ url('xpanel/'.$page_category.'/'.$content['id'].'/edit') }}" uk-icon="icon: pencil" uk-tooltip="title: Rubah Data"></a></li>
              <li><a id="{{ $content['id'] }}" class="btn-hapus uk-transition-slide-right x-transition-delay-2" href="#" uk-icon="icon: close" uk-tooltip="title: Hapus Data"></a></li>
            </ul>
          </div>
        </div>
    @empty
        <div class="x-font-20 uk-width-1-1 uk-background-muted  uk-text-center"><p class="uk-padding">Tidak ada  {{ $page_category == 'article' ? 'Article' : 'Product' }} yang ditemukan.</p></div>
    @endforelse
  </div>

  <hr>
  
  <div class="uk-padding uk-padding-remove-vertical uk-grid-small uk-flex uk-flex-middle uk-text-center" uk-grid>
    <div class="uk-width-auto">
     
        <select name="count" id="count" class="uk-select uk-form-small"  uk-tooltip="title: Jumlah data yang diperlihatkan" style="width:60px">
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

    $('.btn-hapus').click(function (e) { 
      e.preventDefault();

      UIkit.modal.confirm('Apakah anda ingin menghapus data ini?').then(()=>{
        var hash = $('input[name=_token]').val();
        
        $.ajax({
          type: 'DELETE',
          url: url +'/'+this.id,
          data: {'_token':hash},
          dataType: 'JSON',
          success: function (response) {
            
          }
        });

        setTimeout(() => {
            window.location.reload();
        }, 1200);
      });
    });

  </script>
@endsection