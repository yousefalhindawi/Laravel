<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->user() && $request->path() != 'loginUser' && $request->path() != 'registration') {
            return redirect()->route('users.loginUser')->withFailure(__('You must login.'));
        }
        if (auth()->user() && ($request->path() =='loginUser' || $request->path() == 'registration')) {
            return back();
        }

        return $next($request)->header('Cache-Control, no-cache','no-store','max-age=0','must-revalidate')->header('Pragma', 'no-cache')->header('Expires', 'Sat 01 Jan 1970 00:00:00 GMT');
    }
}
