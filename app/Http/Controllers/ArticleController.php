<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Category;
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
        
        $categories = Category::Where('jenis' , 'category-'.request()->segment(2))->orderBy('name' , 'asc')->get();
        return view('admin/article/create' ,  compact('categories'));
       
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
        // dd($request);
        $data =  $request->validate([
          'title'             => 'required',
          'short_description' => 'sometimes',
          'description'       => 'sometimes',
          'tags'              => 'sometimes',
          'price'             => 'sometimes|numeric',
          'price_promo'       => 'sometimes|numeric',
          'image_thumb'       => 'sometimes',
          'category'          => 'sometimes'
        ]);

        $data['slug']          = strtolower(str_replace(' ','-', $data['title']));
        $data['publisher']     = auth()->user()->nama;
        $data['category_page'] = request()->segment(2);
        $data['updated_at']    = Carbon::now();
        $data['tags']          = str_replace(' ','',$data['tags']);
        if ($request['category']) {
          $data['category'] = implode($request['category'] , '|');
        }
        
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
        
        $categories = Category::Where('jenis' , 'category-'.request()->segment(2))->orderBy('name' , 'asc')->get();
        return view('admin/article/create' , compact('content' , 'categories'));
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
        $data = $content;
        unset($data['id']);
        if ($request['txt-with-image'] !== 'with') {
          $data['image_path'] = '';
          $data['image_thumb'] = '';
        }else{
          $image_path =  explode('|',$data['image_path']);
          $image_thumb = $data['image_thumb'];
          $new_image_path = [];
          $new_image_thumb = '';
          foreach ($image_path as $image ) {
            $file_name =  md5($image. time()).'.jpeg';
            Storage::copy('public/'.$image , 'public/uploads/'.$file_name);
           
            if ($image == $image_thumb) {
              $new_image_thumb = 'uploads/'. $file_name ;
            }
            $new_image_path[] = 'uploads/'. $file_name;
          }
          $data['image_path'] = implode('|',$new_image_path);
          $data['image_thumb'] = $new_image_thumb;
        }

        $data['created_at'] = $data['updated_at'] =  Carbon::now() ;
        
        Content::insert($data->getAttributes());

        return redirect()->back();
        
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
        $imageName = '';
      if (isset(request()->data)) {
        $content_filter = Content::WhereIn('id' , request()->data)->get();
        foreach ($content_filter as $row) {
           $image_path = explode('|' , $row['image_path']);
            foreach ( $image_path as $image) {
              Storage::delete("public/$image");
            }
          }
        Content::WhereIn('id' , request()->data)->delete();
      }else{
        $image_path = explode('|' , $content['image_path']);
        foreach ( $image_path as $image) {
          Storage::delete("public/$image");
        }
        $content->delete();
      }

     
      
    }
}
