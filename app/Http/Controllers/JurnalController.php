<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JurnalController extends Controller
{
    //
    public function kasMasuk(){
      return view('proses_data.kas_masuk');
    }
    public function kasKeluar(){
      return view('proses_data.kas_keluar');
    }
}
