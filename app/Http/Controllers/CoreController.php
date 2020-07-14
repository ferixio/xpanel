<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class CoreController extends Controller
{
    //
    function order(Request $request){
      $list_product = $request['list_product'];
     
      $data = $request->validate([
        'name'   => 'required',
        'telp'   => 'required',
        'email'  => 'required',
        'alamat' => 'required'
      ]);
      $data['list_product'] = $list_product;
     
      if ( $list_product == null) {
       
        return response()->json(['errors'=>['jml'=>'Tidak ada produk yang dipesan.']], 422);
      }

      Order::updateOrCreate($data);
      $res = '1';
     return response()->json($res, 200);

    }
}
