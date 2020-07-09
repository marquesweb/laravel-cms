<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name'];

    public function posts(Type $var = null)
    {
        return $this->belongsToMany(Post::class);
    }
}
