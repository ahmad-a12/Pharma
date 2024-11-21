<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckActivated
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        if ($user && !$user->activated) {
            return response()->json(['message' => 'حسابك غير مفعل. تواصل مع المشرف لتفعيله.'], 403);
        }

        return $next($request);
    }
}
