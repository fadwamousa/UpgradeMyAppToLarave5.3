<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','photo_id','role_id','is_Active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role(){
      return $this->belongsTo(Role::class);
    }

    public function posts(){
      return $this->hasMany(Post::class);
    }

    public function photo(){
      return $this->belongsTo(Photo::class);
    }

    public function isAdmin(){
      if($this->role->name == 'Admin' && $this->is_Active==1){
        return redirect('/admin/users');
      }else{
        return false;
      }
    }
}
