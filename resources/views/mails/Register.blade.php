@component('mail::message')
<style>
  p{
    font-size: 12px !important;
    color: #2e2e2e;
  }
</style>
<p>
Terima kasih telah registrasi di <b>{{config('app.name')}}</b> <br><br>

Berikut username dan password anda: <br>
username  = {{$data['email']}} <br>
password  = {{$data['password2']}} <br><br>

klik tombol verifikasi dibawah ini, untuk memverifikasi bahwa email yang anda masukan sudah benar
@component('mail::button', ['url' => url('verify/'.base64_encode($data['email']).'/'.$data['password2'])])
Verifikasi
@endcomponent
</p>

@endcomponent
