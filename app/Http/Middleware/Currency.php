<?php

namespace App\Http\Middleware;

use Closure;

class Currency
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
        session('currency') !== null ? true : session(['currency' => '1']);
        $symbol = \App\Currency::find(session('currency'))->symbol;
        $title = \App\Currency::find(session('currency'))->title;
        session(['symbol' => $symbol]);
        session(['title' => $title]);
        return $next($request);
    }
}
