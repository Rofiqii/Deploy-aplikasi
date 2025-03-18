<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RadiologyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array {
        return [
            'id' => $this->id,
            'assessment_id' => $this->assessment_id,
            'ultrasound_image' => $this->ultrasound_image,
            'pregnancy_status' => $this->pregnancy_status,
            'additional_info' => $this->additional_info,
            'sheep_id' => $this->assessment->sheep->id,
            'sheep_name' => $this->assessment->sheep->sheep_name,
            'created_at' => $this->assessment->created_at,
        ];
    }
}
