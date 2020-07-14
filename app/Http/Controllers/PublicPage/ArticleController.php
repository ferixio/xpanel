<?php

namespace App\Http\Controllers\PublicPage;

use App\Models\Content;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    //
    public function index($slug){
      $id =  request('id');
      $data = Content::Where('id' , $id)->get();
      $id_category = explode('|' , $data[0]['category']);
      $categories = Category::whereIn('id', $id_category)->get();
      return view('product_detail', compact('data', 'categories'));
    }
}
