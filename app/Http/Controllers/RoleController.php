<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Role;

class RoleController extends Controller
{
    public function __construct(Role $roles)
    {
        $this->roles = $roles;
    }

    public function newRole()
    {
        return $this->roles->newRole(\Request::all());
    }

    public function getRoles()
    {
        return $this->roles->roleList();
    }
}
