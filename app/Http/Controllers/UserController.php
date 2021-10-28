<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class UserController extends Controller
{
    public function __construct(User $users)
    {
        $this->users = $users;
    }

    public function index()
    {
        $role = $this->users->getUser(auth()->user()->id);
        $cans = unserialize($role[0]->user_role->role->permissions);
        return \Inertia\Inertia::render('Users',[
            'users' => User::all(),
            'roles' => $role[0]->user_role->role->slug,
            'canCreate' => (in_array("create", $cans)) ? true : false,
            'canUpdate' => (in_array("update", $cans)) ? true : false,
            'canDelete' => (in_array("delete", $cans)) ? true : false,
        ]);
    }
}
