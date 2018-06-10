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

class PatrimonyForLoan extends Authenticatable
{
    use Notifiable;
    public $timestamps = false;
    protected $table = 'patrimonies';

    protected $fillable = ['name','category','model','description', 'image', 'sector', 'status'];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

     
    /** 
     *  Get building name
     *  @return string
     * */
    public function get_count_modelo($modelo){
        return $this->where('model', $modelo)->where('status', 1)->count('model');
    }

    public function sector_name(){
        return $this->belongsTo('App\Models\Sector', 'sector');
    }
}
