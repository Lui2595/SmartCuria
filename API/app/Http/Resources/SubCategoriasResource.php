<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SubCategoriasResource extends JsonResource
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
            "parent"=>$this->subs()->map(function($d){                
                return [
                    "type"=> "shop",
                    "id"=> $d->id,
                    "name"=> $d->nombre,
                    "slug"=>$d->slug,
                    "items"=>"15",
                    "customFields"=> [],  
                    "parent"=>null,
                ];
            })[0],           
            "children" => null
            
        ];
    }
}