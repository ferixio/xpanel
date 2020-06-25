<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
          'image_thumb'       => 'sometimes'
        ]);

        $data['slug']          = str_replace(' ','-', $data['title']);
        $data['publisher']     = auth()->user()->nama;
        $data['category_page'] = request()->segment(2);
        $data['updated_at']    = Carbon::now();
        $data['tags'] = str_replace(' ','',$data['tags']);
        $request['proses'] == 'add' ? $data['created_at'] = Carbon::now() :'';
        
        if ($request['proses'] == 'edit') {
          $imageName = Content::select('image_path')->Where('id',$request['id'])->get();
          $imageOld = explode("|", $imageName[0]['image_path']);
          foreach ($imageOld as $image) {
            Storage::delete("public/$image");
          }
        }
        
        if ($request->hasFile('fl-upload2')) {
          $request->validate([
            'fl-upload2.*' => 'file|max:10000|image'
          ]);
          $files =  $request['fl-upload2'];
          $img_thumb = '';
          foreach ($files as $file) {
                       
            if ($file->getClientOriginalName() == str_replace('uploads/','',$request['image_thumb'])) {
              $img_thumb = $image_path[] = $file->store('uploads' , 'public');
            }else{
              $image_path[] = $file->store('uploads' , 'public');
            }
          }
          $data['image_path']  = implode('|' , $image_path);
          $data['image_thumb'] = $img_thumb;
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
