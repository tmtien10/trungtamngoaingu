<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;


class CheckGiangvien
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
          if((Auth::user())&&(Auth::user()->quyen==3))
        {       return $next($request);  
                
        }
                      
        return redirect('/dangnhap');

    }
}
