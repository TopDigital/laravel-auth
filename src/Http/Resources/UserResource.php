<?php

namespace TopDigital\Auth\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'email_verified_at' => $this->created_at->format('U'),
            'created_at' => $this->created_at->format('U'),
            'updated_at' => $this->updated_at->format('U'),
            'deleted_at' => $this->deleted_at->format('U'),
        ];
    }
}
