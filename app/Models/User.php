<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    // Hookup ; we  are creating a static model which will appear on the
    //screen immediately a user ais created
    Protected static function boot()
    {
       Parent::boot();

       Static::created(function($user){
        $user->profile()->create([
            'title' => $user->username,
        ]);
       });

    }

    public function posts() //the posts here is plural because it has a 1 to many relationship
    {
       return $this->hasMany(Post::class)->orderBy('created_at','DESC');
    }

    public function following()
    {
        return $this->belongsToMany(Profile::class);
    }

public function profile() //the profile here is singular because it has a 1 to 1 relationship
    {
       return $this->hasOne(Profile::class);
    }
}