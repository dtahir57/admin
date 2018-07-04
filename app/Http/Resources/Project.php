<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Project extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description
        ];
    }

    // Use this , when you have relationship with your data for example one to many
    // public function with($request) 
    // {
    //     return [
    //         'version' => '1.0.2',
    //         'author_url' => url('http://localhost:8000/danish_tahir')
    //     ];
    // }
}
