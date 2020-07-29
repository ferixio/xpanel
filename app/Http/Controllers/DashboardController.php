<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Content;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function index()
    {

      $visitor = [
        'all' =>Visitor::count(),
        'this_month' =>Visitor::where('created_at' , 'like' , '%'. Carbon::now()->format('Y-m') .'%')->count(),
        'today' =>Visitor::where('created_at' , 'like' , '%'. Carbon::now()->format('Y-m-d') .'%')->count(),
      ];

      $order = [
        'all'=>Order::count(),
        'masuk'=>Order::where('status' , '0')->count(),
        'menunggu_pembayaran'=>Order::where('status' , '1')->count(),
        'diproses'=>Order::where('status' , '3')->count(),
        'dikirim'=>Order::where('status' , '4')->count(),
        'selesai'=>Order::where('status' , '6')->count(),
        'batal'=>Order::where('status' , '-1')->count(),
      ];

      $order_detail_item =[
        'total_qty' => 0 ,
        'total_nominal' => 0
      ];

      $detail_order =  Order::select('list_product')->get();
      foreach ($detail_order as $row) {
        $items = collect(json_decode($row['list_product']));
        foreach ($items as $item ) {
          $order_detail_item['total_qty'] += $item->qty;
          $order_detail_item['total_nominal'] += ($item->qty * \preg_replace('/\D/' ,'' , $item->price));
        }
      }

      $top_product = Content::where('category_page' , 'product')->orderBy('viewer' , 'desc')->limit(10)->get();
      $top_article = Content::where('category_page' , 'article')->orderBy('viewer' , 'desc')->limit(10)->get();
           

      return view('admin/dashboard' , compact('order' , 'order_detail_item' , 'visitor' , 'top_product' , 'top_article'));
    }
}
