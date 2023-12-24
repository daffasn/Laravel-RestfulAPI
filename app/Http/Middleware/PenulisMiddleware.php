<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\Artikel;

class PenulisMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $artikel = Artikel::findOrFail($request->artikel->id);

        if ($artikel->user_id != Auth::id()) {
            return response()->json(['message' => 'NOT FOUND'], 404);
        }
        return $next($request);
    }
}
