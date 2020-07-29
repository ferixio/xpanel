<?php

namespace App\Http\Controllers\Xpanel;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Order::select('*');
     
        if (!is_null(request('slc-status')) && request('slc-status') !== 'x' ) {
      
          $data =  $data->where('status', request('slc-status'));
          
        }
        
        if (!is_null(request('search'))  ) {
          $data =  $data->where('list_product' , 'like' ,'%'. request('search') .'%')
          ->orWhere('email' , 'like' ,'%'. request('search') .'%')
          ->orWhere('telp' , 'like' ,'%'. request('search') .'%')
          ->orWhere('name' , 'like' ,'%'. request('search') .'%');
        }

      $data = $data->orderBy('created_at', 'desc')->paginate(12);
        
        return view('admin.order', compact('data'));
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
