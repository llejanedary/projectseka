<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
            if ($request->session()->Has('teacher_id')) {
                return $next($request);
            }elseif($request->session()->Has('std_id')){
                return $next ($request);
            }
            elseif($request->session()->Has('id_ta')){
                return $next($request);
            }
            abort(403, 'Unauthorized'); 
    }
}
