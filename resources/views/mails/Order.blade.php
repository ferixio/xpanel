
@component('mail::message')
<style>
  p{
    font-size: 12px !important;
    color: #2e2e2e;
  }
</style>


<img  src="{{$x_setting['ST-0000']['isi']}}" alt="" srcset="" style="max-height:100px;margin-top:50px">
<H4 style="margin:0 !important;font-size:18px;font-weight:bold">{{$x_setting['ST-0001']['isi']}}</H4>
<p style="font-size:12px;font-weight:400">A Trully Brownies Taste</p>
<br>

  Halo kak <b>{{ $data->name}}</b>,  <br>
  terima kasih kak, sudah berbelanja di {{$x_setting['ST-0001']['isi']}} . Berikut rincian pesanannya yah kak

  <p>
    <b>Detail order</b> <br>
    Nomor Transaksi : <b> SL-{{ date_format(new DateTime($data->created_at) , 'Ymd').'-'.$data->id }}</b>
    <hr>
  </p>

  @php
      $total = 0 ;
  @endphp

<p>
  @foreach (json_decode($data->list_product) as $product)
      
  @php
    $sub_total = preg_replace('~\D~' , '' , $product->price)*$product->qty;
    $total += $sub_total;
  @endphp     
  {{$product->name}}  @ {{$product->price}} x {{$product->qty}} = Rp. {{number_format($sub_total)}}<br>
    
@endforeach
</p>
  <hr>
  <b>Total : Rp. {{number_format($total)}}</b> <br><br>

  <p>
    Silahkan melakukan transfer ke salah satu akun bank /  digital money kami dibawah ini sesuai dengan total diatas, <br><br>
    @php
    $banks =  collect(json_decode($x_setting['ST-0008']['isi']));

    @endphp
    @foreach ($banks as $bank =>$value)
      <span style="margin-left:10px">{{strtoupper(str_replace('_',' ',$bank))}} : {{$value->nomor}} ( a.n. {{$value->name}} ) </span><br>
    @endforeach
  </p>
  <br><br>

  @php
      $nomor_whatsapp =  substr($x_setting['ST-0004']['isi'], 0 , 1) == '0' ? '62'.
      substr($x_setting['ST-0004']['isi'], 1 , strlen($x_setting['ST-0004']['isi'])-1) : $x_setting['ST-0004']['isi'];
  @endphp
 <p> kemudian Konfirmasi pembayaran via link dibawah ini <br></p>
  <div style="display: flex !important">
    
  @component('mail::button', ['url' => url('confirmation-order/'.base64_encode($data->id))])
  via website
  @endcomponent

  
  @component('mail::button', ['url' => url('http://wa.me/'.$nomor_whatsapp)])
  via whatsapp
  @endcomponent
  </div>

  
  <br> <br>  
  <p style="padding:10px; background:rgb(214, 214, 214);">

  Pesanan kakak akan segera kami proses dan akan kami kirim setelah proses pembayaran telah terkonfirmasi oleh admin kami <br> dan akan kami kirim ke alamat di bawah ini,<br>
  {{ $data->alamat}}  <br> Telp. <b>( {{ $data->telp}})</b> 
  </p>

Salam hangat dari kami, <br>
<b>{{$x_setting['ST-0001']['isi']}}</b>
@endcomponent
