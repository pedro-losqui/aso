<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Output extends Model
{
    use HasFactory;

    protected $fillable = [
        'input_id', 'user_id', 'rg', 'responsible_name'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function input()
    {
        return $this->belongsTo(Input::class);
    }
}
