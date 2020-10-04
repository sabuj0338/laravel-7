<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            '_id' => $this->_id,
            'name' => $this->name,
            'phone' => $this->phone ?? null,
            'photo' => url($this->photo) ?? null,
            'address' => $this->address ?? null,
            'email' => $this->email,
            // 'type' => $this->type,
            'last_login' => $this->last_login ?? null,
            'email_verified_at' => $this->email_verified_at ? true : false,
            'status' => $this->status ?? null,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
