<?php

namespace App\Models;

use Tymon\JWTAuth\Contracts\JWTSubject;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Support\Facades\DB;


class User extends Model implements AuthenticatableContract, AuthorizableContract, JWTSubject
{
    use Authenticatable, Authorizable, HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';

    protected $fillable = [
        'name', 'email',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'pass',
    ];



    // Rest omitted for brevity

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function admin()
    {
        return $this->hasOne(Roles_usuarios::class,'id_user','id');
    }

    public function direcciones()
    {
        return $this->hasMany(UsuariosDirecciones::class,'id_usuario','id');
    }
    public function ordenes()
    {
        $id=$this->id;
        $sql="SELECT *  FROM `ordenes`  where id_cliente= $id ";
        $r=collect( DB::select(DB::raw($sql)))->map(function($i){
            $id2 = $i->id;
            $sql2="SELECT * FROM imagenes_productos_materiales where id_productos_materiales =$id2";
            $r2=collect( DB::select(DB::raw($sql2)))->map(function ($foto) {
                return $foto->src;
            });
            return [
                "id"=>$i->id,
                "tipo"=>$i->tipo,
                "nombre"=>$i->nombre,
                "des"=>$i->des,
                "imagen"=>$i->imagen,
                "variantes"=>$r2,
                "porcentaje"=>$i->porcentaje,
                "gasto"=>$i->gasto_material 
            ];
        });

        return $r;
    }
    

}
