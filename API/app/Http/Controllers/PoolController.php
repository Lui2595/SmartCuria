<?php
namespace App\Http\Controllers;

use App\Models\Pool;
use App\Models\PoolParticipacion;
use App\Models\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PoolController extends Controller{

    public function participar(Request $r)
    {
        $this->validate($r,[
            'k1' => 'required',
            'k2' => 'required',
            'wallet'=> 'required|exists:usuarios,wallet',
            'monto'=> 'required|numeric|max:50',
            'id_pool'=>'required|exists:pool,id'
        ]);

        if($r->k1!="k1"){
            return response("Clave incorrecta",500);
        }
        if($r->k2!="k2"){
            return response("Clave incorrecta",500);
        }

        $u = Usuarios::where("wallet",$r->wallet)->first();
        $p=new PoolParticipacion();
        $p->id_pool=$r->id_pool;
        $p->id_usuario=$u->id;
        $p->monto=$r->monto;
        $p->save();
        return $p;

    }

    public function pool($id)
    {
        $p=Pool::where("id",$id)->get();
        if(count($p)>0){
            return [
                "total"=>PoolParticipacion::where("id_pool",$id)->sum("monto"),
                "pool"=>$p[0]
            ];

        }else{
            return response("Pool invalida",500);
        }
    }
    public function pooles()
    {

       return Pool::all()->map(function ($v){
        return [
            "total"=>PoolParticipacion::where("id_pool",$v->id)->sum("monto"),
            "pool"=>$v[0]
        ];
       });
    }

    public function participaciones($wallet)
    {
        $p=Usuarios::where("wallet",$wallet)->get();
        if(count($p)>0){

            $d=DB::table('pool_participacion')
            ->selectRaw('*,sum(monto) as total')
            ->join("usuarios","pool_participacion.id_usuario","=","usuarios.id")
            ->join("pool","pool_participacion.id_pool","=","pool.id")
            ->groupBy('id_pool')
            ->where("pool_participacion.id_usuario","=",$p[0]->id)
            ->get();
            return $d;
        }else{
            return response("Wallet invalida",500);
        }
    }
}