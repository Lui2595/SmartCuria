<?php
namespace App\Http\Controllers;

use App\Models\Whitelist;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;


class WhitelistController extends Controller{
    public function participar(Request $r){
        $this->validate($r,[
            'k1' => 'required',
            'k2' => 'required',
            'wallet'=> 'required|unique:whitelist'
        ]);

        $p= new Whitelist();
        $p->wallet=$r->wallet;
        $p->save();
        
        return response("Participación Correcta",200);
    }

    public function participa($wallet)
    {   //return $wallet;
        $d= Whitelist::where('wallet',$wallet)->get();
        if(count($d)==1){
            return response("si",200);
        }else if(count($d)<1){
            return response("no",200);
        }else{
            return response("error",500);
        }
        //$d=Whitelist::all();
        
    }
    public function participantes()
    {
      return  Response( count(Whitelist::all()),200);
    }
}