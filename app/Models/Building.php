<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patrimony extends Model
{
    protected $fillable = ['name','description'];
    protected $guarded = ['id'];
    protected $table = 'buildings';
    public $timestamps = false;
}
