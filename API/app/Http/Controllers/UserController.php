<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Roles_usuarios;
use App\Models\Roles;

use DateTime;
use Illuminate\Contracts\Auth\Factory as Auth2;



class UserController extends Controller
{
    /**
     * Store a new user.
     *
     * @param  Request  $request
     * @return Response
     */
    public function ver()
    {   
        return User::all();
    }
    public function NuevoUsuario(Request $request)
    {   
        $this->validate($request,[
            'pass' => 'required',
            'email' => 'required|email|unique:users'
        ]);
        $usuario = new User();
       // $usuario->UserName=$request->user;
        $usuario->email=$request->email;
        $usuario->password=app('hash')->make($request->pass);
        $usuario->save();

        $rol=Roles::where('nombre','customer')->first()['id'];
        $usuario['id'];
        $asignar = new Roles_usuarios();
        $asignar->id_user=$usuario['id'];
        $asignar->id_rol=$rol;
        $asignar->save();

        $code=200;
        $output=['code'=>$code,'message'=>'Usuario creado exitosamente'];
        return  response()->json($output,200);
    }
    public function EditarUsuario(Request $request)
    {
        # code...
        $usuario = User::find($request->id);
        $usuario->UserName=$request->user;
        $usuario->email=$request->email;
        $usuario->telefono=$request->tel;
        //$usuario->password=app('hash')->make($request->pass);
        $usuario->save();
        return  response("Usuario Actializado",200);
       // return $request;
    }
    public function EliminarUsuario($id)
    {
        # code...
        $usuario = User::find($id);
        $usuario->delete();
        //return  $id;  
       return true;
    }
    public function login(Request $r)
    {   
        //dd($r);//
        $this->validate($r,[
            'pass' => 'required',
            'email' => 'required|email'
        ]);
        $credentials = ['email'=>$r->email, 'password'=>$r->pass];
        //$credentials = request(['email', 'password']);
        //dd($credentials);
       
        //dd($credentials);
        if (!$token = Auth::attempt($credentials)) {
            return response("error",500);
        }
       // return $token;
        return $this->respondWithToken($token);
    }
  
    public function loginfb(Request $r)
    {
         $a=$r->a;
         $b=((object)($r->b))->name;
         $authResponse=(object)((object)$a)->authResponse;
         $id= $authResponse->userID;
         $user = User::where("fbid", $id)->first();
         if(empty( $user) ){
             $user=new User();
             $user->UserName=$b;
             $user->email=$id."@fb.com";
             $user->fbid=$id;
             $user->password=app('hash')->make($id);
             $user->save();

             $rol=Roles::where('nombre','customer')->first()['id'];
             $user['id'];
             $asignar = new Roles_usuarios();
             $asignar->id_user=$user['id'];
             $asignar->id_rol=$rol;
             $asignar->save();

             $credentials = ['email'=>$id."@fb.com", 'password'=>$id];
             if (!$token = Auth::attempt($credentials)) {
                return response("error",500);
            }
           // return $token;
            return $this->respondWithToken($token);
          
           // return  " crear usuario";
         }else{
            $credentials = ['email'=>$user->email, 'password'=>$id];
            if (!$token = Auth::attempt($credentials)) {
               return response("error",500);
           }
          // return $token;
           return $this->respondWithToken($token);
             return  " si hay usuario";
         }
        //  return $user;
    }
    public function __construct(Auth2 $auth)
    {
        $this->auth = $auth;
    }
    public function validar()
    {
        $user=$this->auth->guard(null)->user();
        if($user){
            return $user;
        }
        else{
            return response("Unauthorized", 401);
        }
    }

}