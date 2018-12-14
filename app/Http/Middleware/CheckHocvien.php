<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;


class CheckHocvien
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {  
          if((Auth::user())&&(Auth::user()->quyen==4))
        {       return $next($request);  
                
        }
                      
        return redirect('/dangnhap');

    }
}
