<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
        const ACTIVE_STATUS = '1';
    const INACTIVE_STATUS = '0';
    protected $fillable = [
        'name',
        'member_type',
        'designation',
        'job',
        'job_location',
        'image',
        'status',
    ];
}
