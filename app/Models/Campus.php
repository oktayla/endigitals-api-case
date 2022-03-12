<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PHPUnit\Framework\Constraint\Count;

class Campus extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name', 'address', 'school_id', 'country_id'
    ];

    public function school() {
        return $this->belongsTo(School::class);
    }

    public function country() {
        return $this->belongsTo(Country::class);
    }

    public function students() {
        return $this->hasMany(Student::class);
    }
}
