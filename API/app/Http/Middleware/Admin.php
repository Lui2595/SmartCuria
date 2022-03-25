<?php

namespace App\Http\Middleware;

use App\Models\Roles;
use App\Models\User as UserModel;
use Illuminate\Contracts\Auth\Factory as Auth;
use Closure;
use User;

class Admin
{
 
    /**
     * The authentication guard factory instance.
     *
     * @var \Illuminate\Contracts\Auth\Factory
     */
    protected $auth;

    /**
     * Create a new middleware instance.
     *
     * @param  \Illuminate\Contracts\Auth\Factory  $auth
     * @return void
     */
    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if ($this->auth->guard($guard)->guest()) {
            return response('Unauthorized.', 401);
        }else {
            $id=$this->auth->guard($guard)->user()['id'];
            $q=UserModel::find($id);
            if(!$q->admin){
                return  response('Unauthorized. No tienes rol assignado', 401);
            }
            $id_rol=$q->admin['id_rol'];
            $rol=Roles::find($id_rol)['nombre'];
            if($rol=='admin'||$rol=='god'){
                return $next($request);
            }else{
                return  response('Unauthorized. No tienes los permisos necesarios', 401);
            }
        }

        //return $next($request);
    }
}
