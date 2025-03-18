<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SheepResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array {
        return [
            'id' => $this->id,
            'sheep_name' => $this->sheep_name,
            'sheep_birth' => $this->sheep_birth,
            'sheep_gender' => $this->sheep_gender,
            'sheep_photo' => $this->sheep_photo,
        ];
    }
}
