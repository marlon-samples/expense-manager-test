<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class DashboardController extends Controller
{
    public function __construct(User $users)
    {
        $this->users = $users;
    }

    public function dashboard()
    {
        $role = $this->users->getUser(auth()->user()->id);
        $cans = unserialize($role[0]->user_role->role->permissions);
        return \Inertia\Inertia::render('Dashboard',[
            'roles' => $cans,
            'canCreate' => (in_array("create", $cans)) ? true : false,
            'canUpdate' => (in_array("update", $cans)) ? true : false,
            'canDelete' => (in_array("update", $cans)) ? true : false,
        ]);
    }    
}
