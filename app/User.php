<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Permissions\HasPermissionsTrait;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable, HasPermissionsTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    /**
     * Relacionamento entre as tabelas Users e Roles
     *
     * @return void
     */
    public function roles()
    {
        return $this->belongsToMany(\App\Admin\Role::class);
    }
    
    public function setPasswordAtrribute($value)
    {
        if ($value) {
            $this->attributes['password'] = app('hash')->needsRehash($value) ? bcrypt($value['password']) : $value;
        }
    }
}
