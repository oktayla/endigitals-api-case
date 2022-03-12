<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;
    
    const UPDATED_AT = null;

    protected $fillable = ['name', 'phone_number'];

    public function campus() {
        return $this->belongsTo(Campus::class);
    }

    public function scopeLast24h($query) {
        $last24h = now()->subHours(24);
        
        return $query->whereBetween('created_at', [$last24h, now()]);
    }
}
