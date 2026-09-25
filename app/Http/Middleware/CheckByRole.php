<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckByRole
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {   
        $user = auth()->user(); 
        

        if(!in_array($user->role, $roles)) {
            abort(403, 'Anda tidak punya akses ke halaman ini');
        }

        return $next($request);
    }
}
