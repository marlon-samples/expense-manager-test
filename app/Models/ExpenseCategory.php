<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpenseCategory extends Model
{
    use HasFactory;

    protected $table = 'expense_category';

    protected $dates = ['created_at', 'updated_at'];

    protected $casts = [
        'created_at' => 'date:M d, Y',
        'updated_at' => 'date:M d, Y',
    ];

    protected $fillable = [ 'name' ];

    public function newCategory($data)
    {
        return ExpenseCategory::create([
            'name' => $data
        ]);
    }

    public function listCategory()
    {
        return ExpenseCategory::all();
    }


}
