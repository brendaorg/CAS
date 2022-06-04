<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request)
    {
         return [
            'fullname' => $this->name(),
            'attendance_id' => $this->attendance_id,
         ];
    }
}
