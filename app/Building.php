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

class Building extends Authenticatable
{
    use Notifiable;
    public $timestamps = false;

    protected $fillable = ['name','description'];
    protected $hidden = ['id'];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
}
