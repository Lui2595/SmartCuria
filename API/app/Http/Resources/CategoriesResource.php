<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoriesResource extends JsonResource
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
            "type"=> "shop",
            "id"=> $this->id,
            "name"=> $this->nombre,
            "slug"=>$this->slug,
            "items"=>$this->items(),
            "customFields"=> [],
            "parent" => null
  
            
        ];
    }
}