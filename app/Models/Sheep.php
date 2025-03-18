<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sheep extends Model {
    use HasFactory;

    protected $guarded = ['id'];
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    public static function generateUniqueSheepId() {
        $year = date('y');
        $lastSheep = Sheep::latest('id')->first();
        $lastNumber = $lastSheep ? (int)substr($lastSheep->id, 3) : 0;
        $nextNumber = str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT);
        return 'D' . $year . $nextNumber;
    }

    public function initial_assessments() {
        return $this->hasMany(InitialAssessment::class);
    }
}
