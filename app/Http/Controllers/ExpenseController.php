<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ExpenseCategory;
use App\Models\Expense;
use App\Models\User;

class ExpenseController extends Controller
{
    public function __construct(Expense $expenses, User $users)
    {
        $this->expenses = $expenses;
        $this->users = $users;
    }

    public function index()
    {
        $role = $this->users->getUser(auth()->user()->id);
        $cans = unserialize($role[0]->user_role->role->permissions);
        return \Inertia\Inertia::render('Expenses',[
            'expenses' => $this->expenses->expenseList(),
            'roles' => unserialize($role[0]->user_role->role->permissions),
            'canCreate' => (in_array("create", $cans)) ? true : false,
            'canUpdate' => (in_array("update", $cans)) ? true : false,
            'canDelete' => (in_array("delete", $cans)) ? true : false,
        ]);
    }
}
