<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable; // Ensure Laravel Scout is properly installed and this line is present
use Laravel\Scout\Attributes\SearchUsingFullText; // Ensure this attribute is available and used correctly

class PdfDocument extends Model
{
    use HasFactory, Searchable;

    protected $fillable = ['title', 'content', 'job_id'];

    #[SearchUsingFullText(['title', 'content'])] 
    public function toSearchableArray()
    {
        return [
            'title' => $this->title,
            'content' => $this->content,
        ];
    }


    public function job()
    {
        return $this->belongsTo(Job::class);
    }
}
