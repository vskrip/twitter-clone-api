<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Twitt extends JsonResource
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
            'id' => $this->id,
            'user_id' => $this->user_id,
            'name' => $this->name,
            'email' => $this->email,
            'img_path' => $this->img_path,
            'body' => $this->body,
            'isFollow' => $this->isFollow,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
