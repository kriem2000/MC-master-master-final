<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    use HasFactory;
    protected $fillable = [
        "patient_id",
        "doctor_id",
        "consultation_id",
        "rate_namber",
    ];


    public function patient() {
        return $this->belongsTo(User::class, "patient_id");
    }


    public function doctor() {
        return $this->belongsTo(User::class, "doctor_id");
    }

    public function consultation() {
        return $this->belongsTo(Consultation::class, "consultation_id");
    }
}
