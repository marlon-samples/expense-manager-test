<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Permission;

class PermissionController extends Controller
{
    public function __construct(Permission $permissions)
    {
        $this->permissions = $permissions;
    }

    public function newRermission()
    {
        return $this->permissions->newPermission(\Request::get('type'));
    }

    public function getPermissions()
    {
        return $this->permissions->listPermissions();
    }
}
