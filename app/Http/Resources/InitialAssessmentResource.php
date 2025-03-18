<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InitialAssessmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array {
        return [
            'id' => $this->id,
            'sheep_id' => $this->sheep_id,
            'user_id' => $this->user_id,
            'hoof' => $this->hoof,
            'eye' => $this->eye,
            'wool' => $this->wool,
            // 'symptom_1' => $this->symptom_1,
            // 'symptom_2' => $this->symptom_2,
            // 'symptom_3' => $this->symptom_3,
            'additional_info' => $this->desc,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'sheep_name' => $this->sheep->sheep_name,
        ];
    }
}
