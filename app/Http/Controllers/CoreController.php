<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Order;
use App\Mail\OrderMail;
use App\Models\Setting;
use App\Events\OrderEvent;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Events\RegisterEvent;
use App\Mail\ResetPasswordMail;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class CoreController extends Controller
{
    //
    function history_order(){
      $data = Order::where('email', Auth::user()->email);
     
      if (!is_null(request('slc-status')) && request('slc-status') !== 'x' ) {
     
        $data =  $data->where('status', request('slc-status'));
        
      }
      
      if (!is_null(request('search'))  ) {
        $data =  $data->where('list_product' , 'like' ,'%'. request('search') .'%');
      }

     $data = $data->orderBy('created_at', 'desc')->paginate(12);
      return view('list_order', compact('data'));
    }

    function reset_password(){
      $data =  User::where('email' , request('email'))->firstOrFail();
      Mail::to(request('email'))
          ->queue(new ResetPasswordMail($data));
      
      return redirect()->back()->with('success' , true);
    }

    function create_new_password(){
      $email = base64_decode( request('username'));
      $id = base64_decode(request('id'));
      request()->validate([
        'password' => 'required|confirmed|min:6',
      ]);
      
      $password =  Hash::make(request('password'));
      User::where(['email' => $email , 'id'=> $id])->update(['password' => $password]);
      return redirect()->back()->with('success' , true);
    }

    function pengaturan(){
      $data = request()->validate([
        'nama'   => 'required',
        'telp'   => 'required',
        'alamat' => 'required'
      ]);

      User::where(['email' => Auth::user()->email])->update($data);
      return redirect()->back()->with('success' , true);
      
    }

    function new_password(){
      $email = \base64_decode( request('username'));
      $id = \base64_decode(request('id'));
      $data =  User::where('email' ,'=', $email)->where('id','=', $id)->first();
      return view('new_password_confirmation');
    }



    function order(Request $request){
      $list_product = $request['list_product'];
     
      $data = $request->validate([
        'name'   => 'required',
        'telp'   => 'required',
        'email'  => 'required',
        'alamat' => 'required',
        'catatan' => 'sometimes',
      ]);
      $data['list_product'] = $list_product;  
     
      if ( $list_product == "null") {
        return response()->json(['errors'=>['jml'=>'Tidak ada produk yang dipesan.']], 422);
      }
      
      $data['total'] = $request['total'];
      $order = Order::updateOrCreate($data);
      $order['list_product'] = $request['list_product'];
      
      event(new OrderEvent($order));

      if (!User::where('email' , $data['email'])->exists()) {
        $password =  Str::random(8);
        $data2 = [
          'nama'      => $data['name'],
          'email'     => $data['email'],
          'telp'      => $data['telp'],
          'alamat'    => $data['alamat'],
          'password'  => Hash::make($password),
          'hak_akses' => '10'
        ];
       
        User::insert($data2);
        // Auth::attempt(['email' => $data2['email'], 'password' => $password]);
        $data2['password2'] = $password;
        event(new RegisterEvent($data2));
        
      }
     
      $res = '1';
     return response()->json($res, 200);

    }

    function login_member(){
      Auth::logout();
      return view('masuk');
    }

    function order_proses(){
      switch (strtolower(request('proses'))) {
        case 'proses':
          $proses = 3;
          break;
        
        case 'kirim':
          $proses = 4;
          break;
        
        case 'batalkan':
          $proses = -1;
          break;
        case 'selesai':
          $proses = 6;
          break;
        
        case 'hapus':
          $proses = "x";
          
          break;
        
        default:
         $proses = 0;
          break;
      }

      if ($proses == "x") {
        Order::where('id' , request('id'))->delete();
      }else{
        Order::where('id' , request('id'))->update(['status' => $proses]);
      }
      return response()->json(200);
    }


    function confirmation_order(Request $request){
     
      request()->validate([
        'bukti' =>'required|image|max:10000'
      ]);
      
      $id = $request['id'];
      $file = $request['bukti'];
      $name_file = $file->store('uploads/bukti_transfer' , 'public');
      
      Order::where('id' , $id)->update([
        'status' => 1,
        'bukti_transfer'=>$name_file
      ]);
      return redirect()->back()->with('success' ,  true);
    }

    function company_profile(){
      $setting = Setting::get();
      $data = [];
      foreach ($setting as $row) {
        $data[$row['kode']] = $row;
      }
      
      return view('admin.setting.company_profile', compact('data'));
    }

    function verify(Request $request){
      $username =  base64_decode($request['username']);
      $password =  ($request['password']);
      User::where('email' ,  $username)->update(['verified_at' => Carbon::now()]);
      Auth::attempt(['email' => $username, 'password' => $password]);
      return view('verify_success');
    }

    function company_profile_store(Request $request){
      if (!is_null($request['logo'])) {
        Setting::where('kode','ST-0000')->update(['isi' => $request['logo']]);
      }
      Setting::where('kode','ST-0001')->update(['isi' => $request['nama-perusahaan']]);
      Setting::where('kode','ST-0002')->update(['isi' => $request['alamat']]);
      Setting::where('kode','ST-0003')->update(['isi' => $request['email']]);
      Setting::where('kode','ST-0004')->update(['isi' => $request['handphone']]);
      Setting::where('kode','ST-0005')->update(['isi' => $request['handphone2']]);
      Setting::where('kode','ST-0006')->update(['isi' => $request['telp']]);
      Setting::where('kode','ST-0007')->update(['isi' => json_encode($request['social-media'])]);
      Setting::where('kode','ST-0008')->update(['isi' => json_encode($request['akun-bank'])]);
      Setting::where('kode','ST-0009')->update(['isi' => $request['maps']]);

      $request->session()->flash('proses_simpan', '1');

      return redirect()->back();
    }

}
