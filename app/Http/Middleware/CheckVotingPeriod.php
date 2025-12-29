<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\SystemPeriod;
use Symfony\Component\HttpFoundation\Response;

class CheckVotingPeriod
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!SystemPeriod::isVotingOpen()) {
            return redirect()->route('voting.closed')->with('error', 'Periode voting sudah ditutup');
        }

        return $next($request);
    }
}