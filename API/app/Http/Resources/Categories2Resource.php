<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Categories2Resource extends JsonResource
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
            "parent"=>null,           
            "children" => $this->subs()->map(function($d){
                
                return [
                    "type"=> "shop",
                    "id"=> $d->id,
                    "name"=> $d->nombre,
                    "slug"=>$d->slug,
                    "items"=>"15",
                    "customFields"=> [],  
                    "children"=>null,
                    "parent"=>["type"=> "shop",
                    "id"=> $this->id,
                    "name"=> $this->nombre,
                    "slug"=>$this->slug,
                    "items"=>$this->items(),
                    "customFields"=> [],
                    "parent"=>null, ],
                ];
            })
            
        ];
    }
}