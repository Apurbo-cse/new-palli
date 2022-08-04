<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    const ACTIVE_STATUS = '1';
    const INACTIVE_STATUS = '0';

    protected $fillable = ['name', 'slug', 'image', 'description', 'status'];

    use HasFactory;
}
