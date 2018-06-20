<?php
/**
 * @copyright
 * @author Márcio Isaque I Sen Chen
 * @since 05/06/2018 - 21:37
 *
 */

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Request extends Authenticatable
{
    use Notifiable;
    public $timestamps = false;
    protected $table = 'request';

    protected $fillable = ['patrimony','name','cpf','borrow_date', 'borrow_hour', 'return_date', 'return_hour', 'reason', 'prontuario', 'message', 'user_id', 'status'];
    protected $hidden = ['id'];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}
