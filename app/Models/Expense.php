<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $dates = ['created_at', 'updated_at'];

    protected $casts = [
        'created_at' => 'date:M d, Y',
        'updated_at' => 'date:M d, Y',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(ExpenseCategory::class);
    }

    public function expenseList()
    {
        return Expense::with('user')->with('category')->get();
    }
}
