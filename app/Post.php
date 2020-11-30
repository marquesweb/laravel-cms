<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use SoftDeletes;

    protected $fillable = ['title', 'description', 'content', 'image', 'public_at', 'category_id', 'user_id'];

    protected $dates = [
        'plublished_at'
    ];

    public function deleteImage()
    {
        Storage::delete($this->image);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function hasTag($tagId)
    {
        return in_array($tagId, $this->tags->pluck('id')->toArray());
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeSearched($query)
    {
        $search = request()->query('search');

        if(!$search) {
            return $query->published();
        }

        return $query->where('title', 'LIKE', "%{$search}%");
    }

    public function scopePublished($query)
    {
        return $query->published()->where('published_at', '<=', now());
    }
}
