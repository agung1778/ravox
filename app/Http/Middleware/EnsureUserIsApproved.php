<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureUserIsApproved
{
    public function handle(Request $request, Closure $next)
    {
        if (! auth()->user()?->is_approved) {

            auth()->logout();

            return redirect('/')
                ->with(
                    'error',
                    'Account waiting for approval.'
                );
        }

        return $next($request);
    }
}