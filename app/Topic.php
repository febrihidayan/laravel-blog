<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $fillable = [
        'name', 'slug', 'menu'
    ];

    public function setMenuAttribute($menu)
    {
        $this->attributes['menu'] = is_null($menu) ? false : true;
    }

    public function getCreatedAttribute()
    {
        return $this->created_at->format('d F Y');
    }

    public function getUpdatedAttribute()
    {
        return $this->updated_at->format('d F Y');
    }
}
