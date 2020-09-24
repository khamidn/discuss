<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
    protected $guarded = [];
    
    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function parents()
    {
        return $this->hasMany(Discussion::class, 'parent_id');
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

}
