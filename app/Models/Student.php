<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'first_name', 'last_name', 'gender', 'email', 'phone_number', 'birth_date', 'campus_id'
    ];

    protected $appends = ['full_name'];

    protected $casts = [
        'birth_date' => 'date'
    ];

    /**
     * Get the student's full name.
     *
     * @return string
     */
    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function getBirthDateAttribute($value) {
        return Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('d/m/Y');
    }

    public function campus() {
        return $this->belongsTo(Campus::class);
    }

    public function students() {
        return $this->hasMany(Student::class);
    }

}
