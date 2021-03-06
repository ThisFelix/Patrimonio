<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patrimony extends Model
{
    protected $fillable = ['name','category','model','description', 'image', 'location', 'serialNumber', 'patrimonyNumber', 'sector'];
    protected $guarded = ['id'];
    protected $table = 'patrimonies';
    public $timestamps = false;

    public function setImage($image){
    	return null;
    }
}
