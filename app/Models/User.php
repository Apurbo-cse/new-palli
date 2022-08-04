<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [

        'name','last_name','email','password',

        'phone','user_type',

        'facebook','linkedin',

        'description','image',

        'course_name','course_subject','course_status',

        'job_type','job_designation','job_work',

        'hsc_group','hsc_institute','hsc_status','hsc_passing_year',

        'diploma_subject', 'diploma_institute','diploma_status','diploma_passing_year',

        'bsc_subject','bsc_institute','bsc_status','bsc_passing_year',

        'msc_subject','msc_institute','msc_status','msc_passing_year',

        'mba_subject','mba_institute','mba_status','mba_passing_year',


        'father_name','mother_name',

        'present_add','permanent_add',

        'gender','district','thana',

        'nid','dob', 'religion','blood',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
