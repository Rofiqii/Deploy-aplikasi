<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VitalSign extends Model {
    use HasFactory;

    protected $guarded = ['id'];

    public function assessment() {
        return $this->belongsTo(InitialAssessment::class, 'assessment_id');
    }
}
