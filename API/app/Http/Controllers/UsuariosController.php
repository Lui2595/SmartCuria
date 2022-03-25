<?php
namespace App\Http\Controllers;

use App\Models\Usuarios;
use Illuminate\Http\Request;


class UsuariosController extends Controller{
    public function alta(Request $r)
    {
        $this->validate($r,[
            'k1' => 'required',
            'k2' => 'required',
            'wallet'=> 'required'
        ]);

        if($r->k1!="k1"){
            return response("Clave incorrecta",500);
        }
        if($r->k2!="k2"){
            return response("Clave incorrecta",500);
        }

        $u=Usuarios::where("wallet",$r->wallet)->get();

        if(count($u)>0){
            return $u[0];
        }else{
            $p= new Usuarios();
            $p->wallet=$r->wallet;
            $p->capital=0;
            $p->save();
            return $p;
        }
        
    }

}