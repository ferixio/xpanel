@extends('layouts.app')

@section('content')
  <h5 class="title uk-text-uppercase uk-margin-small" >Overview Page</h5>

  <div class="">

    <div class="uk-width-1-1 x-font-12">
      <div class="uk-card uk-card-default  x-radius10">
        <div class="x-color-accent uk-card-header x-white-text uk-text-bold">Analisa website</div>
        <div class="uk-card-body uk-child-width-1-2@m uk-child-width-1-1 uk-grid" >
          <div>
            <p><b>Viewer /  Pengunjung website :</b> <br>
              Pengunjung website ( <b> {{number_format($visitor['all'])}} Orang</b> )  <br>
                 Pengunjung website bulan ini  ( <b> {{number_format($visitor['this_month'])}} Orang</b> ) <br>
                 Pengunjung website hari ini  ( <b> {{number_format($visitor['today'])}} Orang</b> ) 
            </p>
            <hr style="max-width: 500px"> 
            <p><b>Order / Pesanan Online </b> <br>
              1. Order Masuk ( <b> {{$order['masuk']}} </b> )<br> 
              2. Menunggu pembayaran ( <b class="uk-text-warning">  {{$order['menunggu_pembayaran']}} </b> )<br> 
              3. Diproses ( <b class="uk-text-primary">  {{$order['diproses']}} </b> )<br> 
              4. Dikirim ( <b class="uk-text-primary"> {{$order['dikirim']}} </b> ) <br> 
              5. Selesai ( <b class="uk-text-success"> {{$order['selesai']}} </b> ) <br> 
              6. Dibatalkan ( <b class="uk-text-danger"> {{$order['batal']}} </b> ) <br> 
              7. Semua Pesanan ( <b> {{$order['all']}} </b> ) <br> 
              <hr style="max-width( <b> 500px"> 
                Total produk terjual  : <b>{{number_format($order_detail_item['total_qty'])}} pcs</b><br>
                 Total pesanan masuk ( Rupiah ) : <b>Rp.  {{number_format($order_detail_item['total_nominal'])}}</b> <br>
                
            </p>
          </div>

        
          <div>
            <p><b>Top 10 Product ( based on viewer ) :</b> <br>
              <div id="top-product-viewer">
                @foreach ($top_product as $row)
                  <a href="{{url('product/detail/'.$row['slug']).'?id='.$row['id']}}" target="_blank" class="uk-text-bold">{{$row['title']}}</a> <br>
                  <span class="uk-text-muted x-font-12">Dikunjungin ( {{$row['viewer']}} Kali ) </span>
                  <hr>
                @endforeach    
              </div>               
            </p>
            
            <p><b>Top 10 Article ( based on viewer ) :</b> <br>
              <div id="top-article-viewer">
                @foreach ($top_article as $row)
                  <a href="{{url('product/detail/'.$row['slug']).'?id='.$row['id']}}" target="_blank" class="uk-text-bold">{{$row['title']}}</a> <br>
                  <span class="uk-text-muted x-font-12">Dikunjungin ( {{$row['viewer']}} Kali ) </span>
                  <hr>
                @endforeach      
              </div>               
                             
            </p>
          </div>

        </div>
      </div>
    </div>
    
   
  </div>

@endsection
