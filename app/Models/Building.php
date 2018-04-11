<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    protected $fillable = ['name','description'];
    protected $guarded = ['id'];
    protected $table = 'buildings';
    public $timestamps = false;
}
