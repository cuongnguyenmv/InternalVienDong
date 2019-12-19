<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class CoSoVatChatPer
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


        if(Auth::check() && ! $request->expectsJson()) 
        {

            $manv = Auth::User()->manv;

            if(!\DB::table('Users_PhanQuyen')->where('manv',$manv)->where('auth','csvc')->whereOr('auth','admin')->get()->isNotEmpty())
               return redirect()->route('index');
            else
              return $next($request);
        }
    }
}
