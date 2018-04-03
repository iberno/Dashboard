<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Permissions\HasPermissionsTrait;

class Role extends Model
{
    protected $fillable = ['name', 'slug'];

    use HasPermissionsTrait;
    
    /**
     * Relacionamento entre as tabelas Users e Roles
     *
     * @return void
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }
    /**
     * Relacionamento entre as Tabelas Roles e Permissions
     *
     * @return void
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
}

