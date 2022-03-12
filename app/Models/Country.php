<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    /**
     * Country model has no timestamps.
     */
    public $timestamps = false;

    protected $fillable = ['name'];

    public function campuses() {
        return $this->hasMany(Campus::class);
    }
}
