<?php

namespace App\Permissions;
use App\Admin\{Role, Permission};

trait HasPermissionsTrait
{
    
    /*
    * Assign the given role to the model.
    *
    * @param array ...$roles
    *
    * @return $this
    */
   public function assignRole(...$roles)
   {
        $roles = $this->getAllRoles(array_flatten($roles)); 

        if ($roles === null) {
            return $this;
        }

        $this->roles()->saveMany($roles);

        return $this;
   }
   /**
    * Revoke the given role from the model.
    *
    * @param string| $role
    */
   public function removeRole($role)
   {
       $this->roles()->detach($this->getStoredRole($role));
   }
   /**
    * Remove all current roles and set the given ones.
    *
    * @param array| ...$roles
    *
    * @return $this
    */
   public function syncRoles(...$roles)
   {
       $this->roles()->detach();
       return $this->assignRole($roles);
   }
    /**
     * Atribui Permissões
     */
    public function givePermissionTo(...$permissions)
    {
        $permissions = $this->getAllPermissions(array_flatten($permissions)); 

        if ($permissions === null) {
            return $this;
        }

        $this->permissions()->saveMany($permissions);

        return $this;
    }
    /**
     * Remove Permissões
     */
    public function withDrawPermissionTo(...$permissions)
    {
        $permissions = $this->getAllPermissions(array_flatten($permissions)); 

        $this->permissions()->detach($permissions);
        
        return $this;
    }
    /**
     * Atualização de Permissões a um Perfil
     *
     * @param [type] ...$permissions
     * @return void
     */
    public function syncPermissions(...$permissions)
    {
        $this->permissions()->detach();
        return $this->givePermissionTo($permissions);
    }
    /**
     * Identifica se o usuário tem Perfil
     *
     * @param [type] ...$roles
     * @return boolean
     */
    public function hasRole(...$roles)
    {
        foreach ($roles as $role) {
            if ($this->roles->contains('name', $role)) {
                return true;
            }
        }
        return false;
    }

    protected function hasPermissionTo($permission)
    {
        //has Permission through role
        return $this->hasPermissionThroughRole($permission) || $this->hasPermission($permission);
    }

    protected function hasPermissionThroughRole($permission)
    {
        foreach ($permission->roles as $role) {
            if ($this->roles->contains($role)) {
                return true;
            }
        }
        return false;
    }
    protected function hasPermission($permission)
    {
        return (bool) $this->permissions->where('name', $permission->name)->count();
    }
    /**
     * Roles
     *
     * @param array $roles
     * @return void
     */
    protected function getAllRoles(array $roles)
    {
        return Role::whereIn('name', $roles)->get();
    }
    /**
     * Permissions
     *
     * @param array $permissions
     * @return void
     */
    protected function getAllPermissions(array $permissions)
    {   
        return Permission::whereIn('name', $permissions)->get();
    }
    /**
     * Relacionamento entre Roles and Users
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
    /**
     * Relacionamento entre Permissions and Users
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
}