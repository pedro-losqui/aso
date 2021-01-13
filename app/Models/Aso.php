<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aso extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'type', 'company_id', 'people_id', 'employee_id', 'doctor_id', 'conclusion_id', 
        'workplace', 'post', 'physicist', 'chemical', 'biological', 'ergonomic', 'accident'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function people()
    {
        return $this->belongsTo(People::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function exams()
    {
        return $this->belongsToMany(Exam::class)->withPivot('exam_id', 'execution_date')->withTimestamps();
    }

    public function conclusion()
    {
        return $this->belongsTo(Conclusion::class);
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
