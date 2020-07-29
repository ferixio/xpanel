@extends('layouts.app')
@section('content')
  <h4 class="uk-text-bold uk-text-capitalize">Order page</h4>
  @csrf

  <form  id="form-search" class="uk-grid uk-grid-small uk-flex">
    <div class="uk-search uk-search-default uk-width-expand@m uk-width-1-1">
      <span class="uk-search-icon-flip" uk-search-icon></span>
      <input class="uk-search-input" name="search" type="search" placeholder="pencarian..." value="{{request('search')}}">
    </div>
    <div class="uk-width-auto@m uk-width-1-1 uk-margin-small-left@m">
      <select name="slc-status" id="slc-status" class="uk-select">
        <option value="x" {{request('slc-status') == 'x' ? 'selected' : '' }}>Semua pesanan</option>
        <option value="0" {{request('slc-status') == '0' ? 'selected' : ''}}>Menunggu pembayaran</option>
        <option value="1" {{request('slc-status') == '1' ? 'selected' : ''}}>Bukti transfer terupload</option>
        <option value="3" {{request('slc-status') == '3' ? 'selected' : ''}}>Diproses</option>
        <option value="4" {{request('slc-status') == '4' ? 'selected' : ''}}>Dikirim</option>
        <option value="6" {{request('slc-status') == '6' ? 'selected' : ''}}>Selesai</option>
        <option value="-1" {{request('slc-status') == '-1' ? 'selected' : ''}}>Dibatalkan</option>
      </select>
    </div>
  </form>
  <hr>
  <ul uk-accordion="multiple : false">

    @forelse ($data as $order)
      @php
         switch ($order->status) {
           case '-1':
             $status = 'Batal';
             $class_status = 'uk-text-danger';
            break;
            
            case '0':
              $status = 'Menunggu pembayaran';
              $class_status = 'uk-text-muted';
            break;
            
           case '1':
              $status = 'Bukti transfer terupload';
              $class_status = 'uk-text-warning';
             break;
           
             case '2':
             $status = 'Pembayaran terkonfirmasi';
             $class_status = 'uk-text-success';
            break;
           
           case '3':
           $status = 'Diproses';
           $class_status = 'uk-text-warning';
             break;
           
           case '4':
             $status = 'Dikirim';
             $class_status = 'uk-text-warning';
             break;
             
           case '5':
           $status = 'Barang telah sampai';
           $class_status = 'uk-text-success';
             break;
             
           case '6':
             $status = 'Selesai';
             $class_status = 'uk-text-success';
            break;
           
            default:
              $status = 'diproses';
              $class_status = 'uk-text-muted';
            break;
         }
      @endphp
      <li>
        <a href="#" class="uk-accordion-title">
          <div class="uk-text-capitalize" ><b class="x-font-18" >SL-{{ date_format(new DateTime($order->created_at) , 'Ymd' ).'-'.$order->id}} </b><br>{{$order->name}} ( {{$order->telp}} ) </div>
          <div class="uk-margin-small-top uk-text-muted">
            <div class="">
              Rp. {{number_Format($order->total)}} - <span class="{{$class_status}}">{{$status}}</span>
            </div>
            <div class="x-font-12">
              {{date_format(new DateTime($order->created_at) , 'Y-M-d H:i' )}}
            </div>
          </div>
        </a>

        <div class="uk-accordion-content uk-box-shadow-small uk-padding">
          <div class="x-font-16 uk-text-bold">
            SL-{{ date_format(new DateTime($order->created_at) , 'Ymd' ).'-'.$order->id}}
          </div>
          <div class="x-font-14 ">
            Nama Pemesan : {{ $order->name }} <br>
            Alamat : {{ $order->alamat }} <br>
            @php
                $telp = $order->telp;
                if (substr($telp, 0 , 1) == '0') {
                  $telp = '62'. substr($order->telp, 1 , strlen($order->telp));
                }
            @endphp
            <a href="https://wa.me/{{$telp}}" target="_blank" class="uk-flex uk-flex-middle "> <span class="uk-icon" uk-icon="icon: whatsapp;"></span> {{ $order->telp }} </a> <br>

          </div>

         <div class="uk-margin-small-top "> <b>Detail Barang :</b></div>
          <hr class="uk-margin-small">
           @foreach (collect(json_decode($order->list_product)) as $product)
              <div class="uk-margin-small-bottom">
                <span class="x-font-14 uk-text-bold"><a href="{{  url('product/detail/'.$product->name.'?id='.$product->id) }}" target="_blank">{{$product->name}}</a> </span> <br>
                <span class="x-font-12 uk-margin-small-left">@ {{$product->price}} x {{  $product->qty }}  = Rp. {{number_format(preg_replace('/\D/' , '' , $product->price) * $product->qty)}} </span>
              </div>
           @endforeach
          <hr>
            <p class="uk-text-bold x-font-16">Total pesanan : Rp. {{number_Format($order->total)}}</p>
            <p class="uk-text-italic x-font-14">Catatan : {{  $order->catatan }}</p>
            <p class="uk-margin-medium-bottom">Status pesanan : <br> <span class="{{$class_status}} x-font-14 uk-text-bold">( {{$status}} ) </span> <br>
              @if (!is_null($order->bukti_transfer))
                <span uk-lightbox>
                  <a href="{{asset('storage/'.$order->bukti_transfer)}}" class="x-font-12 uk-text-bold" ><i uk-icon="icon: file-text"></i> Lihat bukti transfer</a>
                </span>
              @endif
              
            </p>
          @if ($order->status !== "6")
            <div class="uk-flex uk-flex-between" data-id="{{$order->id}}">
              <div class="uk-child-width-expand uk-child-width-auto@m">
                @if ($order->status < 3)
                  <button class="uk-button uk-button-small x-font-12 btn-proses" style="margin-bottom:5px;">Proses</button>
                @endif
                @if ($order->status < 4 )
                  
                  <button class="uk-button uk-button-small x-font-12 btn-proses" style="margin-bottom:5px;">Kirim</button>
                @endif
                @if ($order->status < 5)
                  <button class="uk-button uk-button-small x-font-12 btn-proses" style="margin-bottom:5px;">Selesai</button>
                @endif
              </div>
              <div class="uk-child-width-expand uk-child-width-auto@m">
                <button class="uk-button uk-button-danger uk-button-small x-font-12 btn-proses" style="margin-bottom:5px;">Batalkan</button>
                <button class="uk-button uk-button-danger uk-button-small x-font-12 btn-proses" style="margin-bottom:5px;">Hapus</button>
              </div>
            </div>
          @endif
        </div>
        <hr>
      </li>
     
    
    @empty
        <li class="x-font-20 uk-width-1-1 uk-background-muted  uk-text-center"><p class="uk-padding"> Order not found</p></li>
    @endforelse
  </ul>

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


  <script>

    document.addEventListener('DOMContentLoaded',()=>{
      $('#slc-status').change(function (e) { 
        e.preventDefault();
        $('#form-search').submit();
      });
      $('.btn-proses').click(function (e) { 
        e.preventDefault();
        var proses = $(this).html();
        var id = $(this).parent().parent().attr('data-id');
        $.ajax({
          type: "POST",
          url: `{{url('order-proses')}}/${proses}/${id}`,
          data: {'_token': '{{csrf_token()}}'} ,
          dataType: "JSON",
          success: function (response) {
            proses = proses == 'Proses' ? 'diproses' : proses == 'Kirim' ? 'dikirim' : proses == 'proses' ? 'diproses' : proses;
            UIkit.modal.alert('Status data pesanan ini telah diubah menjadi '+proses.toLowerCase()).then(()=>{
              window.location.reload()
            })
          }
        });
      });
    });

    
  </script>
 
@endsection