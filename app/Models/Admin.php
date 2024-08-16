<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Admin extends Authenticatable
{

    use HasFactory, Notifiable;

    protected $table = 'admins';

    protected $fillable = [
        'name', 
        'username', 
        'password', 
        'email', 
        'contact', 
        'profile'
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password'
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'password' => 'hashed'
        ];
    }



    // Define any additional model properties or methods as needed

    // Example of defining a relationship
    // public function posts()
    // {
    //     return $this->hasMany(Post::class);
    // }
}