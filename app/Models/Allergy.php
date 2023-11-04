<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Allergy extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'treatment_id', 'patient_id'];
    public function treatment()
    {
        return $this->belongsTo(Treatment::class);
    }
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
