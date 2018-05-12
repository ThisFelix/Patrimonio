<?php
/**
 * @copyright Created by PhpStorm.
 * 
 * @author Márcio Isaque
 *
 */

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Room extends Authenticatable
{
    use Notifiable;
    public $timestamps = false;

    protected $fillable = ['name', 'number', 'description', 'building','sector'];
    protected $hidden = ['id'];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

     /** 
     *  Get building name
     *  @return string
     * */
    public function building_name(){
        return $this->belongsTo('App\Building', 'building');
    }


    public function sector_name(){
        return $this->belongsTo('App\Models\Sector', 'sector');
    }
}
