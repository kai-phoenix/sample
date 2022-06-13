<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = ['name', 'password', 'description'];
    
    public function posts(){
        return $this->hasMany('App\Post');
    }
    
    public function isEditable($post){
        return $this->isAdmin() || $this->id === $post->user->id;
    }
    
    public function isAdmin(){
        return $this->admin === 1;
    }
}
