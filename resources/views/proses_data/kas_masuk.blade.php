@extends('layouts.app')
@section('content')
<h5 class="title uk-text-uppercase uk-text-left@l uk-text-center">Form Kas Masuk</h5>

<form class="uk-form-stacked uk-grid-small uk-padding-small" uk-grid>
 <div class="uk-width-1-4@m uk-width-1-1 ">
 
    <div class="uk-form-controls">
      <label class="uk-form-label">Pilih tanggal</label>
      <input type="text" name="tgl" id="tgl" class="uk-input x-date" placeholder="pilih tanggal transaksi">
    </div>
 
    <div class="uk-form-controls uk-margin-small-top">
      <div class="uk-form-label">keterangan</div>
      <textarea name="keterangan" id="keterangan" cols="30" rows="5" placeholder="masukan keterangan disini" class="uk-padding-small x-padding-10" style="width: 100%;"></textarea>
    </div>
 
 </div>

 <div class="uk-width-expand@m uk-width-1-1 uk-padding-small">
   <div class="uk-box-shadow-small uk-padding-small">
    <h5 class="uk-text-bold x-font-14">Daftar Akun yang di kredit</h5>
    <div >
      <table class="uk-table uk-table-hover uk-table-striped">
        <caption></caption>
        <thead>
          <tr>
            <th>Akun Perkiraan</th>
            <th>Nominal</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td></td>
            <td></td>
            <td></td>
          </tr>
        </tbody>
      </table>
    </div>
   </div>
 </div>
</form>

@endsection