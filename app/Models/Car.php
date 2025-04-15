<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $table = 'cars';

    protected $fillable = [
        'user_id',
        'code',
        'name',
        'engine_number',
    ];

    // relasi dari car ke user
    public function user() {
        return $this->belongsTo(User::class);
    }
}
