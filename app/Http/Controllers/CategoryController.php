<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if (request()->segment(2) == 'category-article') {
          $data = Category::Where('jenis' , 'category-article')->orderBy('name')->get();
        }else{
          $data = Category::Where('jenis' , 'category-product')->orderBy('name')->get();
        }
        return view('admin.category.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $data =  $request->validate([
          'id'     => 'sometimes',
          'name'   => 'required',
          'id_parent' => 'sometimes'
        ]);

        is_null($data['id_parent']) || empty($data['id_parent']) ? '0' : $data['id_parent'];
        $data['jenis'] = $request->segment(2);
        
        $id_parent = $request['id_parent'] !== '0' ?  $request['id_parent'].'|'.Category::select('id_parent')->Where('id', $request['id_parent'])->get()[0]['id_parent'] : '0';
        
        $data['id_parent'] = $id_parent;
        $category = Category::updateOrCreate(
          ['id'=>$request['id']],
          $data
        );
        
        if ($request['jenis_proses'] == 'edit') {
          // dd($request['jenis_proses']);
          return redirect('xpanel/'.$data['jenis']);
        }else{
          return redirect()->back()->with('category' , $category);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
        if (request()->segment(2) == 'category-article') {
          $data = Category::Where('jenis' , 'category-article')->orderBy('name')->get();
        }else{
          $data = Category::Where('jenis' , 'category-product')->orderBy('name')->get();
        }
        return view('admin.category.index', compact('data' , 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
        $id = $category['id'];
        $categories = Category::get();
        foreach ($categories as $data) {
          $id_parent = explode('|',$data['id_parent']);
          if (in_array($id , $id_parent)) {
            Category::Where('id' , $data['id'])->update(['id_parent' => '0']);
          }
        }
        $category->delete();
        
        return redirect()->back();
    }
}
