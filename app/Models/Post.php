<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [

        'title',
        'slug',
        'description',
        'published_at',
        'image',
        'tag',
        'is_featured',
        'status',
    ];
    protected $dates = [
        'published_at',
    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
