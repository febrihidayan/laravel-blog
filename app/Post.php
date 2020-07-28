<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{


    public function getCreatedAttribute()
    {
        return $this->created_at->format('d F Y');
    }

    public function getUpdatedAttribute()
    {
        return $this->updated_at->format('d F Y');
    }
}
