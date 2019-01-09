<?php

namespace App\Providers;
use App\LopHoc;
use App\LopKhoa;
use DB;
use Session;
use Illuminate\Support\ServiceProvider;
use URL;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */

    public function boot()
    {
        URL::forceScheme('https');

        view()->composer('layout.header',function($view){
            $lophoc =  LopHoc::orderBy('MaLop','DESC')->get();
             $view->with('lophoc',$lophoc);
        });
         view()->composer('layout.right',function($view){
           
            $lophoc =  DB::table('lophoc')->orderBy('MaLop','DESC')->paginate(9,['*'],'pag');
             $view->with('lophoc',$lophoc);
        });
          view()->composer('layout.right',function($view){
           
            $lopkhoa = DB::table('lopkhoa')->join('lophoc','lophoc.MaLop','=','lopkhoa.MaLop')->orderBy('id','DESC')->paginate(3,['*'],'pag');
             $view->with('lopkhoa',$lopkhoa);
        });
         
    }
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
