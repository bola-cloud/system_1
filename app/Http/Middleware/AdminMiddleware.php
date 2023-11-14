<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check())
        {
            if(Auth::user()->category =='admin')
            {
                return $next($request);
            }
            else
            {
                session()->flash('admin','you are not admin');
                return redirect()->back();
                // return redirect('/products')->with('message','you are not admin');
            }
        }
        else
        {
            return redirect('/')->with('message','please login firstly');
        }

    }
}
