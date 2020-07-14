@extends('layouts.public')
@section('content')
<section class="uk-text-center uk-height-small uk-background-cover uk-position-relative" data-src="{{asset('storage/uploads/page/bg_produk.jpg')}}" alt="" srcset="" uk-img  >
  <div class=" uk-position-cover ">

    <h3 class="uk-position-center uk-text-bold x-font-32 x-white-text uk-text-uppercase" style="text-shadow: 2px 4px 5px #4e4e4e;">Formulir Pesanan</h3>
  </div>
</section>
  <section class="uk-container uk-margin-large-top uk-margin-large-bottom">
    <div class="uk-child-width-1-1 uk-child-width-1-2@m uk-flex uk-grid">
      <div class="uk-flex-last@m uk-padding">
        <div class="uk-text-center">
          <h4 class="uk-text-capitalize uk-text-bold  uk-margin-remove-bottom ">Identitas diri</h4>
          <p class="uk-text-meta uk-margin-remove-top">Lengkapi data diri anda dibawah ini.</p>
        </div>
        <hr>
        <form id="form-pesan" action="#" method="POST" class="uk-margin-medium-top uk-padding uk-padding-remove-vertical">
          
          <div class="uk-margin-small">
            <label for="" class="x-font-12 uk-text-meta">Nama Lengkap</label>
            <input type="text" name="name" class="uk-input" placeholder="masukan nama anda disini" required>
            <p id="err-name" class="x-font-12 x-nomargin uk-text-danger  x-error">@error('name'){{$message}}@enderror</p>
          </div>
          <div class="uk-margin-small">
            <label for="" class="x-font-12 uk-text-meta">Nomor telp / Whatsapp</label>
            <input type="tel" name="telp" class="uk-input" placeholder="masukan nomor telp anda disini" required>
            <p id="err-telp" class="x-font-12 x-nomargin uk-text-danger  x-error">@error('telp'){{$message}}@enderror</p>
          </div>
          <div class="uk-margin-small">
            <label for="" class="x-font-12 uk-text-meta">Email</label>
            <input type="email" name="email" class="uk-input" placeholder="masukan alamat email anda disini" required>
            <p id="err-email" class="x-font-12 x-nomargin uk-text-danger  x-error">@error('email'){{$message}}@enderror</p>
          </div>
          <div class="uk-margin-small">
            <label for="" class="x-font-12 uk-text-meta">Alamat</label>
            <input type="text" name="alamat" class="uk-input" placeholder="masukan alamat anda disini" required>
            <p id="err-alamat" class="x-font-12 x-nomargin uk-text-danger  x-error">@error('alamat'){{$message}}@enderror</p>
          </div>
          <button id="btn-simpan-pesanan" class="uk-button uk-button-default uk-margin-medium-top uk-align-center" type="button">Proses Pesanan Anda</button>
        </form>
      </div>
      <div class="uk-padding uk-box-shadow-small uk-text-left@m uk-text-center">
        <h4 class="uk-text-bold  uk-margin-remove-bottom ">Daftar Belanja</h4>
        <p class="uk-text-meta uk-margin-remove-top">Berikut daftar belanja yang ada dikeranjang belanja anda.</p>
        <hr>
        <div class="list-cart uk-flex uk-flex-column uk-text-left"></div>
        <hr>
        <p class="x-font-24 "><span class="x-font-14">Total Belanja :</span> <br> <b>Rp.</b> <span class="uk-text-bold total-belanja"></span></p>
        <p class="uk-text-bold uk-text-italic x-font-12">*Total belanja diatas belum termasuk biaya ongkos kirim</p>
      </div>
     
    </div>
  </section>
    
@endsection
<script>
  document.addEventListener('DOMContentLoaded',()=>{
    updateCart();
    $('#form-pesan').submit(function (e) { 
      e.preventDefault();
      var data = new FormData(this);
      hash = $('meta[name=csrf-token]').attr('content');;
      var listProduct =  localStorage.getItem('cart');
      
      data.append('list_product' , listProduct );
      data.append('_token', hash);
      $.ajax({
        type: "POST",
        url: "{{url('order')}}",
        data: data,
        dataType: "JSON",
        processData: false,
        contentType: false,
        cache: false,
        enctype: 'multipart/form-data',
        success: function (res) {
           if (res == "1") {
             localStorage.removeItem('cart');
             UIkit.modal.alert(`<div>
             <p class="uk-text-bold">Data pesanan telah tersimpan.</p>
             <p class="uk-text-meta">Anda akan mendapatkan invoice pesanan anda ke alamat email / Nomor Whatsapp yang anda masukan.</p></div>`).then(()=>{
               location.reload()
             })   
          }
        },
        error: (res)=>{
          var errors =  res.responseJSON.errors;
          $('.x-error').html('');
          if (errors.jml) {
            UIkit.modal.alert('Mohon pilih produk yang ingin dipesan terlebih dahulu.')
          }else{
            UIkit.modal.alert('Proses penyimpanan masih belum berhasil, mohon dicek kembali field yang dimasukan')
          
            if (errors) {
              Object.keys(errors).forEach(key => {
                $(`#err-${key}`).html(errors[key]);
              });
            }
          }
        }
      });
    });
    
    $('#btn-simpan-pesanan').click(function (e) { 
      
      e.preventDefault();
      UIkit.modal.confirm('Apakah anda ingin memproses pesanan ini?').then(()=>{
       $('#form-pesan').submit();
      })
    });
  });
</script>