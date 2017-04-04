<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 *
 * @property string $username
 *
 * @package App\Models
 */
class User extends Model
{
    protected $table = 'user';
    
    protected $hidden = ['password_hash'];
    
    protected $guarded = [
        'id', 'status'
    ];
    
    public function getUserNameAttribute($value)
    {
        return ucfirst($value);
    }
    
    public function setUserNameAttribute($value)
    {
        $this->attributes['username'] = strtolower($value);
    }
    
    public function getPosts()
    {
        return [
            [
                'id' => 1,
                'name' => 2,
            ],
        ];
    }
}
