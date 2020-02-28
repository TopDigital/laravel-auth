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
            'login' => $this->login,
            'email' => $this->email,
            'phone' => $this->phone,
            'email_verified_at' => $this->email_verified_at ? $this->email_verified_at->format('U') : null,
            'phone_verified_at' => $this->phone_verified_at ? $this->phone_verified_at->format('U') : null,
            'created_at' => $this->created_at->format('U'),
            'updated_at' => $this->updated_at->format('U'),
            'deleted_at' => $this->deleted_at ? $this->deleted_at->format('U') : null,
        ];
    }
}
