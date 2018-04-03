<?php
namespace App\Observers;
use App\Admin\Permission;

class PermissionObserver
{
    public function creating(Permission $permission)
    {
        $permission->slug = str_slug($permission->name);
    }
}