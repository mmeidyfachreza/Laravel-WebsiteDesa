<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
   protected $dates = ['created_at', 'updated_at'];
 
   public function user()
    {
        return $this->belongsTo(User::class);
    }
 
    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }
}
