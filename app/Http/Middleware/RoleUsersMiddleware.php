<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class RoleUsersMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next,$role)
    {
        $users=User::find($request->session()->get('user_id'));
        if($users->role()->where('name',$role)->first())
        {
            return $next($request);
        }
        return redirect()->back();

    }
}
