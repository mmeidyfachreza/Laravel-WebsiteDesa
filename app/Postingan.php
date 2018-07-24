<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Postingan extends Model
{
    //
	protected $table = 'postingan';

	protected $fillable = ['user_id','isi','judul','gambar','divisi'];

	public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable')->whereNull('parent_id');
    }

    public function kategori()
    {
        return $this->hasMany(Kategori::class);
    }
}

