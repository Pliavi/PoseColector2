<?php

namespace App\Http\Middleware;

use Closure;

class CantDoItAgain
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
        if($request->session()->has('cantAgain')){
            $request->session()->flash('error', 'Você não poderá refazer nos próximos minutos');
            return response()->view('finish');
        } else {
            return $next($request);
        }
    }
}
