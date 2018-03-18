<?php

namespace Bantenprov\Anggaran\Http\Middleware;

use Closure;

/**
 * The AnggaranMiddleware class.
 *
 * @package Bantenprov\Anggaran
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class AnggaranMiddleware
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
        return $next($request);
    }
}
