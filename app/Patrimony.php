<?php
/**
 * Created by PhpStorm.
 * User: mathe
 * Date: 20/03/2018
 * Time: 21:37
 */

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Patrimony extends Authenticatable
{
    use Notifiable;
    public $timestamps = false;

    protected $fillable = ['name','category','model','description', 'image', 'location'];
    protected $hidden = ['id'];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
}