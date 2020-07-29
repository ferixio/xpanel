@extends('layouts.public')
@section('content')
    <section class="uk-container uk-padding uk-margin-large">
        <form action="{{url('pengaturan')}}" method="POST" class="uk-box-shadow-small uk-padding uk-align-center" style="max-width: 400px">
          <p class="x-font-18 uk-text-bold uk-text-center">Pengaturan data member</p>
          @csrf
          <div>
            <label for="">nama lengkap</label>
              <input type="text" name="nama" id="nama" value="{{Auth::user()->nama}}" class="uk-input">
              <p id="err-nama" class="x-font-12 x-nomargin uk-text-danger  x-error">@error('nama'){{$message}}@enderror</p>
          </div>
          <div>
            <label for="">Telp</label>
              <input type="tel" name="telp" id="telp" value="{{Auth::user()->telp}}" class="uk-input">
              <p id="err-telp" class="x-font-12 x-nomargin uk-text-danger  x-error">@error('telp'){{$message}}@enderror</p>
          </div>
          <div>
            <label for="">alamat</label>
              <textarea name="alamat" id="" cols="30" rows="5" class="uk-textarea">{{Auth::user()->alamat}}</textarea>
              <p id="err-alamat" class="x-font-12 x-nomargin uk-text-danger  x-error">@error('alamat'){{$message}}@enderror</p>
          </div>
         <div class="uk-flex uk-flex-between uk-flex-middle">
          <button class="uk-button uk-button-default uk-margin-small-top">Simpan perubahan</button>
         <a class="x-color-theme-text x-font-12" href="{{url('reset-password')}}">Ganti password</a>
         </div>

         @if (session('success') == true)
         <p class="uk-padding uk-background-muted uk-text-success">Data telah diperbarui.</p>
         @endif
         
        </form>
    </section>
@endsection