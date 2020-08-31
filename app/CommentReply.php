<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentReply extends Model
{
    //
    protected $fillable=['author','email','body', 'is_active', 'comment_id','photo'];

    public function comment(){
        return $this->belongsTo('App\Comment');
    }

}
