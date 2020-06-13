<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    //
    public function index(Request $request){
      $data = $request->validate([
        'image' =>'file|image|max:10000'
      ]);
      // dd($request);
      $res['image'] = $request['image']->store('uploads/summernote', 'public');
      echo json_encode($res);
    }
}
