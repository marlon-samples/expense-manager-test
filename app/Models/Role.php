<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Role extends Model
{
    use HasFactory;

    protected $dates = ['created_at', 'updated_at'];

    protected $casts = [
        'created_at' => 'date:M d, Y',
        'updated_at' => 'date:M d, Y',
    ];

    protected $fillable = [ 'name', 'slug', 'permissions' ];

    public function newRole($data)
    {
        return Role::create([  
            'name' => $data['name'],
            'slug' => Str::of($data['name'])->slug('-'),
            'permissions' => serialize($data['permissions']),
        ]);
    }

    public function roleList()
    {
        return Role::all();
        $data = [
            'id' => $roles[0]['id'],
            'name' => $roles[0]['name'],
            'permissions' => unserialize($roles[0]['permissions']),
            'created_at' => $roles[0]['created_at']
        ];
        return response()->json($data);
    }
}
