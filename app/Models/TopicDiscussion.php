<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TopicDiscussion extends Model
{
    protected $guarded = [];

    public function parents()
    {
        return $this->hasMany(TopicDiscussion::class, 'parent_id');
    }

    public function belongparent()
    {
        return $this->belongsTo(TopicDiscussion::class, 'parent_id');
    }

    public function discussable()
    {
        return $this->morphTo();
    }

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }
}
