<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Category;
use Illuminate\Http\Request;

class PageController extends Controller
{
    //
    
    public function home(){
      $data = Content::orderBy('created_at','desc')
            ->Where('category_page' , 'product')->paginate(8);
      return view('home', compact('data'));
    }
    
    public function content(){
      dump(\request()->query('type'));
    }
    
    public function product(){
      $category = Category::Where('jenis' , 'category-product')->orderBy('name')->get();

      $keyword       = request()->keyword;
      $paginate      = request()->paginate !== null ? request()->paginate : 12;
      $sort          = request()->sort;
      $page_category = request()->segment(2) == 'article' ? 'article' : 'product';
      $data          = Content::orderBy('created_at','desc');

      if ( $keyword !== null) {
        
        $data = $data
        ->Where('title' , 'like' , '%'.$keyword.'%')
        ->orWhere('tags' , 'like' , '%'.$keyword.'%')
        ->orWhere('description' , 'like' , '%'.$keyword.'%');
      }

      if ($page_category == 'article') {
        $data =  $data->Where('category_page' , 'article');
      }else{
        $data =  $data->Where('category_page' , 'product');
      }

      if ($sort == 'asc') {
        $data = Content::orderBy('created_at','asc');
      }

      
      $data = $data->paginate($paginate);
      return view('product', compact('category', 'data' , 'keyword'));
    }
}
