<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BidangUsahaController extends Controller
{
    //
    public function index(){
      return view('master_data.bidang_usaha');
    }
}
