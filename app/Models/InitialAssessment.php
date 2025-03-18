<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InitialAssessment extends Model {
    use HasFactory;

    protected $guarded = ['id'];
    public $timestamps = true;

    public function sheep() {
        return $this->belongsTo(Sheep::class, 'sheep_id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function radiologies() {
        return $this->hasMany(Radiology::class);
    }

    public function vitalSigns() {
        return $this->hasMany(VitalSign::class);
    }
}
