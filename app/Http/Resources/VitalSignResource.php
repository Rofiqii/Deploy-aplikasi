<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VitalSignResource extends JsonResource
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
            'temperature' => $this->temperature,
            'heart_rate' => $this->heart_rate,
            'respiratory_rate' => $this->respiratory_rate,
            'weight' => $this->weight,
            'additional_info' => $this->additional_info,
            'status_condition' => $this->status_condition,
            'sheep_id' => $this->assessment->sheep->id,
            'sheep_name' => $this->assessment->sheep->sheep_name,
            'created_at' => $this->assessment->created_at->setTimezone('Asia/Jakarta')->format('Y-m-d H:i:s'),
        ];
    }
}
