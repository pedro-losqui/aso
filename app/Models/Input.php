<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Input extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'type', 'employee', 'company', 'allocation', 'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
