<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleChecker
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // dd($role);
        switch ($role) {
            case 'admin':
                # code...
                $role = "2";
                if (auth()->user()->level == "2" || auth()->user()->level == "1") {
                    return $next($request);
                } else {
                    return redirect()->route('home');
                }

                break;
            case 'agent':
                $role = "0";
                if (auth()->user()->level == "0") {
                    return $next($request);
                } else {
                    return redirect()->route('home');
                }
                break;
            // case 'verifier':
            //     $role = "1";
            //     if (auth()->user()->level == "0") {
            //         return $next($request);
            //     } else {
            //         return redirect()->route('home');
            //     }
            //     break;
            default:
                # code...
                break;
        }

        // dd($role);


    }
}
