<?php

namespace App\Http\Middleware;

use Closure;

class AuthCheck
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
        if(!session()->has('LoggedUser') && ($request->path() != 'admin-login')){

            return redirect('admin-login')->with('gagal','anda harus login');

        }

        if(session()->has('LoggedUser') && ($request->path() == 'admin-login')){
        return back();
        
        }

        return $next($request)->header('Cache-Control','no-cache, no-store, max-age=0, must-revalidate')
                                ->header('Pragma','no-cache')
                                ->header('Expires','Sat 01 Jan 1990 00:00:00 GMT');
    }
    
  
}
