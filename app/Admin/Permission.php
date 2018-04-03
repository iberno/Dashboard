<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = ['name', 'table', 'slug'];
    
    /**
     * Relacionamento entre as tabelas Permissions e Roles
     *
     * @return void
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
