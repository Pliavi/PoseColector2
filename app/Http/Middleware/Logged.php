<?php

namespace App\Http\Middleware;

use Closure;

class Logged
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
        if(!$request->session()->has('folder') || !$request->session()->has('volunteer')){
            $request->session()->flash('error', 'É necessário se identificar antes de inicar!');
            return redirect()->route('index');
        }
        return $next($request);
    }
}
