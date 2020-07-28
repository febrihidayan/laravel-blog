<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title', 'slug', 'excerpt', 'content', 'user_id', 'topic_id'
    ];

    public function getCreatedAttribute()
    {
        return $this->created_at->format('d F Y');
    }

    public function getUpdatedAttribute()
    {
        return $this->updated_at->format('d F Y');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    public function topics()
    {
        return $this->belongsTo(Topic::class, 'topic_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
