<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'age', 'race', 'profile_image'];

    public function diseases()
    {
        return $this->hasMany(Disease::class);
    }
    public function allergies()
    {
        return $this->hasMany(Allergy::class);
    }
    public function dates()
    {
        return $this->hasMany(Date::class);
    }
}
