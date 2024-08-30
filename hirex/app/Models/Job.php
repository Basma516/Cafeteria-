<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'requirements',
        'location',
        'category_id',
        'job_status',
        'job_type',
        'responsibilities',
        'emp_id',
        'salary',
        'benefits',
        'deadline',
        'logo',
    ];

    // Relationship with Employer model
    public function employer()
    {
        return $this->belongsTo(Employer::class, 'emp_id');
    }

    

}
