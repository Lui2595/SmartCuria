<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductoListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
       
        return [
            'page' => $this->id,
            'limit' => $this->nombre,
            'sort' => $this->sku,
            'total' => $this->slug,              
            'pages' => $this->price,
            "from"=>null,
            'to' =>$this->badges,
            'items'=>intval($this->rating()),
            'filters'=>$this->comments(),
            
        ];
    }
}