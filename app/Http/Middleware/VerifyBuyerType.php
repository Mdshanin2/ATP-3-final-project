<?php

namespace App\Http\Middleware;

use Closure;

class VerifyBuyerType
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

        if($request->session()->get('type') == 'buyer'){
            return $next($request);
        }else{
            $request->session()->flash('msg', 'invalid request...');
            return redirect()->route('buyer_home.index');
        }
    }
}
