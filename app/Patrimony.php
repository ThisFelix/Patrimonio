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

    protected $fillable = ['name','category','model','description', 'image', 'location', 'serialNumber', 'patrimonyNumber'];
    protected $hidden = ['id'];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
}
