<?php

namespace App\Http\Middleware;

use Closure;
use App\Locale;

class Languages
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
        session('lang') !== null ? true : session(['lang' => '1']);
        $title = Locale::where('id',session('lang'))->first()->title;
        app()->setLocale($title);
        return $next($request);
    }
}
