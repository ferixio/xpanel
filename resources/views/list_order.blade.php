@extends('layouts.public')
@section('content')

  <section class="uk-text-center uk-height-small uk-background-cover uk-position-relative" data-src="{{asset('storage/uploads/page/bg_produk.jpg')}}" alt="" srcset="" uk-img  >
    <div class=" uk-position-cover ">

      <h3 class="uk-position-center uk-text-bold x-font-32 x-white-text uk-text-uppercase" style="text-shadow: 2px 4px 5px #4e4e4e;">Riwayat Pesanan Anda</h3>
    </div>
  </section>
  <section class="uk-container uk-padding uk-box-shadow-small uk-margin-medium">
    <form  id="form-search" class="uk-flex">
      <div class="uk-search uk-search-default uk-width-expand">
        <span class="uk-search-icon-flip" uk-search-icon></span>
        <input class="uk-search-input" name="search" type="search" placeholder="pencarian..." value="{{request('search')}}">
      </div>
      <div class="uk-width-auto uk-margin-small-left">
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
    <p class="x-font-18 uk-text-bold">Daftar pesanan</p>
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
              $class_status = 'uk-text-primary';
              break;
            
              default:
                $status = 'diproses';
                $class_status = 'uk-text-muted';
              break;
          }
        @endphp
        <li>
          <a href="#" class="uk-accordion-title">
            <div class="uk-text-capitalize"><b class="x-font-16">SL-{{ date_format(new DateTime($order->created_at) , 'Ymd' ).'-'.$order->id}} </b> 
              <br>  {{date_format(new DateTime($order->created_at) , 'd-M-Y H:i' )}} </div>
            <div class="uk-margin-small-top uk-text-muted">
              <div class="">
                Rp. {{number_Format($order->total)}}
              </div>
              <div class="x-font-12">
                status pesanan <span class="{{$class_status}} uk-text-bold">{{$status}}</span>
              </div>
             
            </div>
          </a>
          <hr>

          <div class="uk-accordion-content uk-box-shadow-small uk-padding uk-child-width-1-1">
            <div>
              <div class="x-font-16 uk-text-bold">
                Nomor pesan : SL-{{ date_format(new DateTime($order->created_at) , 'Ymd' ).'-'.$order->id}} 
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
                Telp : <span >{{ $order->telp }}</span> <br>
  
              </div>
  
              <div class="uk-margin-small-top "> <b>Detail Barang :</b></div>
              <hr class="uk-margin-small">
              @foreach (collect(json_decode($order->list_product)) as $product)
                  <div class="uk-margin-small-bottom">
                    <span class="x-font-14 uk-text-bold"><a class="x-color-theme-text" href="{{  url('product/detail/'.$product->name.'?id='.$product->id) }}" target="_blank">{{$product->name}}</a> </span> <br>
                    <span class="x-font-12 uk-margin-small-left">@ {{$product->price}} x {{  $product->qty }}  = Rp. {{number_format(preg_replace('/\D/' , '' , $product->price) * $product->qty)}} </span>
                  </div>
              @endforeach
              <hr>
                <p class="uk-text-bold x-font-16">Total pesanan : Rp. {{number_Format($order->total)}}</p>
                <p class="uk-text-italic x-font-14">Catatan : {{  $order->catatan }}</p>
                <div>
                  Status pesanan: <span class="{{$class_status}} uk-text-bold"> {{ $status}} </span>
                </div>
                <div class="uk-drop uk-background-muted">
                  Silahkan mentransferkan sesuai total pesanan yang anda lakukan ke salah satu bank / payment method dibawah ini :  <br>
                  1. {{ $x_setting->where('kode' , 'ST-0008')}}
                </div>
              <div class="uk-flex uk-flex-between uk-margin-medium-top">
                <div class="uk-child-width-expand uk-child-width-auto@m">
                 @if ( $order->status < 3)
                  <button data-id="{{$order->id}}" data-notrans="SL-{{ date_format(new DateTime($order->created_at) , 'Ymd' ).'-'.$order->id}}" data-total="Rp. {{number_Format($order->total)}}" class="uk-button uk-button-small btn-konfirmasi-bayar x-font-12" style="margin-bottom:5px;">Konfirmasi pembayaran</button>
                 @endif
                </div>
                <div class="uk-child-width-expand uk-child-width-auto@m">
                  @if ($order->status == 0)
                    <button data-id="{{$order->id}}" class="uk-button uk-button-danger uk-button-small x-font-12 btn-proses" style="margin-bottom:5px;">Batalkan</button>
                  @endif
                </div>
              
              </div>
            </div>
         
          </div>
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
  </section>

  <div id="modal-konfirmasi" uk-modal>
    <div class="uk-modal-dialog uk-modal-body x-font-12">
      <button class="uk-modal-close-default" type="button" uk-close></button>
      <p class="x-font-14">Nomor transaksi : <span id="modal-notrans" class="uk-text-bold x-font-14"></span><br>
      Total Biaya :   <span id="modal-total" class=" uk-text-bold x-font-14"></span> <hr> 
      <span class="x-font-14">
        silahkan mentransferkan total diatas ke salah satu akun bank / digital money kami di bawah ini:  <br><br>
        @foreach (collect(json_decode($x_setting['ST-0008']['isi'])) as $bank => $value)
            {{strtoupper(str_replace('_' ,' ', $bank))}} : {{$value->nomor}} ( a.n. {{$value->name}} ) <br>
        @endforeach
      </span>
      <br>
      <form action="#" id="form-confirmation" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
          <label for="">pilih file / foto bukti transfer</label> <br>
          <input type="file" name="bukti" id="bukti" class="uk-padding-remove-horizontal" style="border-radius:0 !important" required>
        </div>
        <button class="uk-button-default uk-button uk-margin-medium-top">Kirim bukti transfer</button>
      </form>

      </p>
    </div>
  </div>
  <script>

    document.addEventListener('DOMContentLoaded',()=>{
      var success = `{{session('success')}}`
      if (success == true) {
        UIkit.modal.alert('Bukti transfer telah terupload, silahkan menunggu konfirmasi dari admin')
      }

      $('#slc-status').change(function (e) { 
        e.preventDefault();
        $('#form-search').submit();
      });
      $('.btn-konfirmasi-bayar').click(function (e) { 
        e.preventDefault();
        var id = $(this).attr('data-id');
        var notrans = $(this).attr('data-notrans');
        var total = $(this).attr('data-total');
        $('#form-confirmation').attr('action', `{{url('confirmation-order')}}/${id}`);
        $('#modal-notrans').html(notrans);
        $('#modal-total').html(total);
        UIkit.modal('#modal-konfirmasi').show();
      });

      $('.btn-proses').click(function (e) { 
          e.preventDefault();
          var proses = $(this).html();
          var id = $(this).attr('data-id');
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