<?php

namespace App\Providers;

use App\Models\Setting;
use App\Models\Visitor;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);
        $wa = Setting::where('kode' , 'ST-0004')->firstOrFail();
        $wa = preg_replace('/\D/' , '' ,$wa['isi']);
        $wa = substr($wa , 0 , 1) == '0' ? '62'.substr($wa , 1 , strlen($wa)-1) : $wa;

        $social_media = \json_decode(Setting::where('kode' , 'ST-0007')->firstOrFail()['isi']);

        config(['app.locale' => 'id']);
        Carbon::setLocale('id');
        date_default_timezone_set('Asia/Jakarta');
        
        \DB::listen(function($query) {
            \Log::info(
                $query->sql,
                $query->bindings,
                $query->time
            );
        });
              
       
        View::share('x_setting' , Setting::get()->keyBy('kode'));
        View::share('social_media' , $social_media);
        View::share('wa' , $wa);
       
        
        if (strtolower(Request::segment(1)) !== 'xpanel') {
          Visitor::insert([
            'ip' => Request::ip(),
            'page'=> Request::url(),
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now(),
          ]);
        }
    }
}
