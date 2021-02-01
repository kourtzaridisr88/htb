<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dimension extends Model
{
    protected $fillable = ['name'];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function teleportHistory()
    {
        return $this->hasMany(TeleportHistory::class);
    }
}
