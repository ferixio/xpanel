@component('mail::message')
# Reset Password

klik tombol dibawah ini untuk mereset password akun anda,

@component('mail::button', ['url' => url('new-password/'.base64_encode($data2->email).'/'.base64_encode($data2->id))])
Reset password
@endcomponent

@endcomponent
