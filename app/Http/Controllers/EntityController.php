<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EntityController extends Controller
{
    //
    public function supplier(){
      return view('master_data.supplier');
    }
    public function customer(){
      return view('master_data.customer');
    }
}
