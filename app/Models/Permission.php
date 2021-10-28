<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Permission extends Model
{
    use HasFactory;

    protected $dates = ['created_at', 'updated_at'];

    protected $casts = [
        'created_at' => 'date:M d, Y',
        'updated_at' => 'date:M d, Y',
    ];

    protected $fillable = [ 'type', 'slug' ];

    public function newPermission($data)
    {
        return Permission::create([
            'type' => $data,
            'slug' => Str::of($data)->slug('-'),
        ]);
    }

    public function listPermissions()
    {
        return Permission::all();
    }

}
