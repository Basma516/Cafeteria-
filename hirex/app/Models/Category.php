<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    // Define the table associated with the model
    protected $table = 'job_categories';

    // Define the fillable fields
    protected $fillable = ['name'];
}
