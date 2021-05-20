<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AuthGate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->check() && routeIf('admin.*')){

            $auth_user = auth()->user();

            if($auth_user->role_id == 1){
                $auth_user_permissions = Permission::pluck('name');
            }else{
                $auth_user_permissions = $auth_user->role->permissions->pluck('name');
            }

            foreach($auth_user_permissions as $permission){
                Gate::define($permission, function(){
                    return true;
                });
            }

        }

        return $next($request);
    }
}
