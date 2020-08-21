<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable=[
        'title','body', 'category_id', 'photo_id'

    ];

    public function user(){

        return $this->belongsTo('App\User'); //one to many relationship  ****This relationship tells that a user can have many posts that's why one to many relationship is applied
    }
    public function photo(){
        return $this->belongsTo('App\Photo'); //inverse relationship
    }
    public function category(){
        return $this->belongsTo('App\category'); // inverse relationship
    }

}
