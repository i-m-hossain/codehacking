<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;

use Illuminate\Database\Eloquent\Model;

use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Post extends Model
{
    //
    use Sluggable;
    use SluggableScopeHelpers;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */

    protected $fillable=[
        'title','body', 'category_id', 'photo_id','slug'

    ];


    public function user(){

        return $this->belongsTo('App\User'); //one to many relationship  ****This relationship tells that a user can have many posts that's why one to many relationship is applied
    }
    public function photo(){
        return $this->belongsTo('App\Photo'); //inverse relationship
    }
    public function category(){
        return $this->belongsTo('App\Category'); // inverse relationship
    }
    public function comments(){
        return $this->hasMany('App\Comment'); //has many relationship : a post has many comments
    }
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title',
                'onUpdate' => true
            ]
        ];
    }

}
