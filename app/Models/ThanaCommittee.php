<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThanaCommittee extends Model
{

    const ACTIVE_STATUS = '1';
    const INACTIVE_STATUS = '0';
    protected $fillable = [
        'title',
        'description',
        'name',
        'department',
        'status',
        'image',
        'thana_type',
    ];
}
