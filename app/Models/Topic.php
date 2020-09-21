<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Topic extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function discussions()
    {
        return $this->belongsTo(Discussion::class);
    }

    // Mengambil parent induk dari setiap diskusi

    public function getRootTopicDiscussion()
    {
        return $this->topic_discussions()->with(['discussable', 'parents'])->whereNull('parent_id')->get();
    }

    public function topic_discussions()
    {
        return $this->hasMany(TopicDiscussion::class);
    }

    
}
