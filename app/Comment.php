<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $fillable = ['author','body','post_id','is_active','email','photo'];


    public function post(){
      return $this->belongsTo(Post::class);
    }

    public function replies(){
      return $this->hasMany(CommentReply::class);
    }
}
