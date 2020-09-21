<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
    public function topics()
    {
        return $this->hasMany(Topic::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
