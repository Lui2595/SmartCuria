<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductoResource extends JsonResource
{
    public static $wrap = 'items';
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function with($request)
    {
        return [
            'filters' => [
                'Holas' => $request,
            ],
        ];
    }
  
    public function toArray($request)
    {
        $madera=[];
        $tela=[];
        $dimen=[];
        $object =$this->prederteminados();
        for ($i=0; $i < count($object) ; $i++) { 
            $e=$object[$i];
            if($e["tipo"]=="Madera"){
                $madera=$e;
            }
            if($e["tipo"]=="Telas"){
                $tela=$e;
            }
            if($e["tipo"]=="Dimensiones"){
                $dimen=$e;
            }
          
        }
        return [
            'id' => $this->id,
            'name' => $this->nombre,
            'sku' => $this->sku,
            'slug' => $this->slug,              
            'price' => $this->price,
            "compareAtPrice"=>$this->comparacion,
            "discount"=>$this->descuento,
            "reciente"=>$this->reciente,
            'images'=>$this-> fotos(),
            'badges' =>$this->badges,
            'rating'=>intval($this->rating()),
            'reviews'=>$this->comments(),
            'availability' => $this->availability,
            'brand' => $this->marca(),
            'categories'=>$this->categorias(),
            'attributes'=>$this->atributos(),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'materiales'=>$this->materiales(),
            'variaciones'=>[
                "original"=>[
                    "precio"=> $this->price,
                    "compareAtPrice"=> $this->comparacion,
                    "images"=>$this-> fotos()
                ],
                "madera"=> $madera,
                "telas"=>$tela,
                "dimensiones"=>$dimen
            ],
            'especs'=>[[
                "name"=>"General",
                "attributes"=>$this->especs()]
            ],
            "comentarios"=>$this->comentarios(),
            "des"=>$this->des(),
            "mix"=>$this->mix(),
            "keywords"=>$this->keywords
            

        ];
    }
  
    
}