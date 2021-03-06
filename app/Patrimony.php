<?php
/**
 * @copyright Created by PhpStorm.
 * @author mathe
 * @since 20/03/2018 - 21:37
 *
 */

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Patrimony extends Authenticatable
{
    use Notifiable;
    public $timestamps = false;

    protected $fillable = ['name','category','model','description', 'image', 'location', 'serialNumber', 'patrimonyNumber', 'sector'];
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
    public function location_name(){
        return $this->belongsTo('App\Room', 'location');
    }
    public function sector_name(){
        return $this->belongsTo('App\Models\Sector', 'sector');
    }
}
