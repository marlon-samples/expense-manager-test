<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ExpenseCategory;

class ExpenseCategoryController extends Controller
{
    public function __construct(ExpenseCategory $expensecategorys)
    {
        $this->expensecategorys = $expensecategorys;
    }

    public function newCategory()
    {
        return $this->expensecategorys->newCategory(\Request::get('name'));
    }

    public function getCategory() 
    {
        return $this->expensecategorys->listCategory();
    }
}
