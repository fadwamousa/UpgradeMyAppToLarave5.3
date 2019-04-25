<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentReply extends Model
{

  protected $fillable = ['author','body','comment_id','is_active','email','photo'];

    public function comment(){
      return $this->belongsTo(Comment::class);
    }
}
