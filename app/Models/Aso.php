<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aso extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'company_id', 'people_id', 'employee_id', 'doctor_id', 'conclusion_id', 'workplace', 'post', 'physicist', 'chemical', 'biological', 'ergonomic', 'accident'
    ];
}
