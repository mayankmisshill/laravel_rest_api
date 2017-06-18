<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Storage;

class TokenExist
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
        if(Storage::disk('local')->has('token')){
            if($request->route()->uri() == '/api/profile'){
                    return $next($request);
            }else{
                    return redirect('api/profile');
            }
        }
        else if($request->route()->uri() == '/api/profile'){
            return redirect('api/login');
        }

        return $next($request);
    }
}
