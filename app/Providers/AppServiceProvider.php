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
              
        Schema::defaultStringLength(191);
        View::share('x_setting' , Setting::get()->keyBy('kode'));
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
