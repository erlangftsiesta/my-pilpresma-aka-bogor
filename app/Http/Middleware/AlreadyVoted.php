<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AlreadyVoted
{
    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user();

        if ($user->has_voted) {
            return redirect()->route('voting.thankyou');
        }

        return $next($request);
    }
}
