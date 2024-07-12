<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class Role
{
    public function handle(Request $request, Closure $next, $role)
    {
        if (Auth::check()) {
            if (auth()->user()->role == 'admin') {
                return $next($request);
            } else if (auth()->user()->role == 'student') {
                return Redirect::route('student.home');
            }
            else {
                Auth::logout();

                $request->session()->invalidate();

                $request->session()->regenerateToken();

                return redirect('/login');
            }
        }
        if(!Auth::check()){
            return redirect('/login');
        }
        abort(403);
    }
}
