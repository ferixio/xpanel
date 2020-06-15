<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        $keyword =  request()->keyword;
        $paginate =  request()->paginate !== null ? request()->paginate : 12;
        $sort =  request()->sort;
        $data = Content::orderBy('created_at','desc');
        $page_category = request()->segment(2) == 'article' ? 'article' : 'product';


        if ($sort == 'asc') {
          $data = Content::orderBy('created_at','asc');
        }

        if ($page_category == 'article') {
          $data =  $data->Where('category' , 'article');
        }else{
          $data =  $data->Where('category' , 'product');
        }

        if ( $keyword !== null) {
          $data = $data
          ->orWhere('title' , 'LIKE' , "%$keyword%")
          ->orWhere('tags' , 'LIKE' , "%$keyword%")
          ->orWhere('publisher' , 'LIKE' , "%$keyword%");
        }
       
        
        
        
        $data = $data->paginate($paginate);
        return view('admin/article/index', compact('data' , 'keyword'));
      }
      
      /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */
      public function create()
      {
        //
        return view('admin/article/create');
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // $request['price'] = str_replace(',' ,'' ,  $request['price']);
        // $request['price_promo'] = str_replace(',' ,'' ,  $request['price_promo']);
        // dd($request['price']);
        $data =  $request->validate([
          'title'             => 'required',
          'short_description' => 'sometimes',
          'description'       => 'sometimes',
          'tags'              => 'sometimes',
          'price'             => 'sometimes|numeric',
          'price_promo'       => 'sometimes|numeric',
        ]);

        $data['slug']      = str_replace(' ','-', $data['title']);
        $data['publisher'] = auth()->user()->nama;
        $data['category']  = request()->segment(2);
        $data['updated_at'] =Carbon::now();
        
        if ($request['proses'] == 'add') {
          $data['created_at'] =Carbon::now();
          
        }
        

        if ($request->hasFile('image_path')) {
          $request->validate([
            'image_path' => 'file|max:10000|image'
          ]);

          $data['image_path'] = $request['image_path']->store('uploads' , 'public');       
        }

        Content::updateOrCreate(
          ['id'=>$request['id']],
          $data
          );
      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function show(Content $content)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function edit(Content $content)
    {
        //
      
        return view('admin/article/create' , compact('content'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Content $content)
    {
        //
        dd(request()->segment(2));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function destroy(Content $content)
    {
        //
      $content->delete();
    }
}
