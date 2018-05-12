<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    protected $fillable = ['name', 'responsible', 'responsibleEmail', 'sectorEmail', 'sectorPhone'];
    protected $guarded = ['id'];
    protected $table = 'sectors';
    public $timestamps = false;
}
