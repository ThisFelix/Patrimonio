<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = ['name', 'number', 'description', 'building', 'sector'];
    protected $guarded = ['id'];
    protected $table = 'rooms';
    public $timestamps = false;

    
}

