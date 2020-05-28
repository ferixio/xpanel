<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AkunPerkiraanController extends Controller
{
    //
    public function index(){
      return view('master_data.akun_perkiraan');
    }
}
