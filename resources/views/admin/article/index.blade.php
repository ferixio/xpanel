@extends('layouts.app')
@section('content')
  <h4 class="uk-text-bold">Halaman Artikel</h4>
 @csrf

  <div class="uk-grid-small uk-child-width-1-2@l uk-flex uk-flex-middle" uk-grid>
    <form action="{{ url('xpanel/article/') }}" method="GET" class="uk-search uk-search-default">
      <button type="submit" class="uk-search-icon-flip" uk-search-icon></button>
    <input name="keyword" class="uk-search-input" type="search" placeholder="Pencarian Data ..." value="{{ $keyword }}">
    </form>
    <div>
      <ul class="uk-iconnav uk-child-width-expand uk-text-center uk-padding uk-padding-remove-vertical">
        <li><a href="{{ url('xpanel/article/create') }}" id="btn-add" href="#" uk-icon="icon: plus" uk-tooltip="title: Tambah Data"  ></a></li>
        <li><a id="btn-grid" href="#" uk-icon="icon: thumbnails" uk-tooltip="title: Tampilan Grid"></a></li>
        <li><a id="btn-list" href="#" uk-icon="icon: menu" uk-tooltip="title: Tampilan List"></a></li>
        <li><a href="#" uk-icon="icon: pull" uk-tooltip="title: Sortir A-Z"></a></li>
        <li><a href="#" uk-icon="icon: push" uk-tooltip="title: Sortir Z-A"></a></li>
        <li><a href="#" uk-icon="icon: file-text" uk-tooltip="title: Export Data"></a></li>
      </ul>
    </div>
</div>

<div id="x-grid" class="uk-flex uk-child-width-1-1 uk-grid-small uk-padding uk-grid-match" uk-grid>

    @forelse ($data as $content)
        <div>
          <div class="x-grid-item uk-box-shadow-small x-list uk-flex uk-flex-middle  uk-transition-toggle" tabindex="0">
            <div  style="height:100px;width:100px;background-image:url({{ is_null($content['image_path']) || empty($content['image_path']) ? asset('images/photo.svg')  : asset('storage/'.$content['image_path']) }});background-size:cover;" class="uk-border-rounded uk-margin uk-width-auto"></div>

            
            
            <div class="x-grid-desc uk-margin-medium-left  uk-width-expand">
              <p class="uk-text-capitalize x-font-16 uk-width-expand uk-text-bold  uk-margin-remove">{{ $content['title']}}</p>
              <p class="uk-text-meta x-font-12  uk-margin-remove "> 
                {!! '<br>Oleh: <b>'. $content['publisher'].'</b><br><span class="x-font-10">'.date_format(date_Create($content['created_at']),'d-M-Y H:i').'</span>'!!} </p>

                
            </div>
            <ul class="x-grid-icon uk-iconnav uk-iconnav-vertical">
              <li><a class="btn-edit uk-transition-slide-right" href="{{url('xpanel/article/'.$content['id'].'/edit')}}" uk-icon="icon: pencil" uk-tooltip="title: Rubah Data"></a></li>
              <li><a id="{{ $content['id'] }}" class="btn-hapus uk-transition-slide-right x-transition-delay-2" href="#" uk-icon="icon: close" uk-tooltip="title: Hapus Data"></a></li>
            </ul>
          </div>
        </div>
    @empty
        <div class="x-font-20 uk-width-1-1 uk-background-muted  uk-text-center"><p class="uk-padding">Tidak ada article yang ditemukan.</p></div>
    @endforelse
  </div>

  <hr>

  <div class="uk-padding uk-padding-remove-vertical uk-grid-small uk-flex uk-flex-middle uk-text-center" uk-grid>
    
    <div class="uk-width-auto">
      <form action="#">
        <select name="count" id="count" class="uk-select uk-form-small"  uk-tooltip="title: Jumlah data yang diperlihatkan" style="width:60px">
          <option value="10">12</option>
          <option value="25">24</option>
          <option value="50">48</option>
          <option value="100">96</option>
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
  <script>
    let url = `{{ url('xpanel/article') }}`;
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