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
      $article = Content::orderBy('created_at','desc')
            ->Where('category_page' , 'article')->paginate(8);
            
      return view('home', compact('data' , 'article'));
    }
    
    public function content(){
      dump(request()->query('type'));
    }
    
    public function product(){
      $category = [];
      $filter        = request()->cek_category;
      $keyword       = request()->keyword;
      $paginate      = request()->paginate !== null ? request()->paginate : 12;
      $sort          = request()->sort;
      $page_category = request()->segment(1);
      $data          = Content::select('*');

      if ($sort == 'asc') {
        $data = $data->orderBy('price','asc');
      }elseif ($sort == 'desc'){
        $data = $data->orderBy('price','desc');
      }else{
        $data = $data->orderBy('created_at','desc');
      }

      if ( $keyword !== null) {
        
        $data = $data
        ->where('title' , 'like' , '%'.$keyword.'%')
        ->orWhere('tags' , 'like' , '%'.$keyword.'%')
        ->orWhere('description' , 'like' , '%'.$keyword.'%');
      }

     

      if ($page_category == 'article') {
        $data =  $data->where('category_page' , 'article')
        ->where('category' , 'like' , '%'.$filter.'%')
        ->paginate($paginate);
        
        $category = Category::where('jenis' , 'category-article')->orderBy('name')->get();
        return view('article', compact('category', 'data' , 'keyword', 'sort' , 'paginate' , 'filter'));
      }elseif ($page_category == 'website'){
        $data =  $data->where('category_page' , 'product')
        ->where('category' , 'like' , '%'.$filter.'%')
        ->paginate($paginate);


        $category = Category::where('jenis' , 'category-product')->orderBy('name')->get();
        return view('website', compact('category', 'data' , 'keyword', 'sort' , 'paginate' , 'filter'));
      }elseif ($page_category == 'seo'){
        $data =  $data->where('category_page' , 'product')
        ->where('category' , 'like' , '%'.$filter.'%')
        ->paginate($paginate);


        $category = Category::where('jenis' , 'category-product')->orderBy('name')->get();
        return view('seo', compact('category', 'data' , 'keyword', 'sort' , 'paginate' , 'filter'));
      
      }elseif ($page_category == 'design'){
        $data =  $data->where('category_page' , 'product')
        ->where('category' , 'like' , '%'.$filter.'%')
        ->paginate($paginate);


        $category = Category::where('jenis' , 'category-product')->orderBy('name')->get();
        return view('design', compact('category', 'data' , 'keyword', 'sort' , 'paginate' , 'filter'));
      
      }elseif ($page_category == 'application'){
        $data =  $data->where('category_page' , 'product')
        ->where('category' , 'like' , '%'.$filter.'%')
        ->paginate($paginate);


        $category = Category::where('jenis' , 'category-product')->orderBy('name')->get();
        return view('application', compact('category', 'data' , 'keyword', 'sort' , 'paginate' , 'filter'));
      }

    }
}
