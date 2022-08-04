<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PMember extends Model
{
    const ACTIVE_STATUS = '1';
    const INACTIVE_STATUS = '0';
    protected $fillable = [
        'name',
        'designation',
        'job',
        'job_location',
        'image',
        'published_at',
        'status',
    ];
    protected $dates = [
        'published_at',
    ];
}
