<?php

namespace App;

use App\Lab;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Glassware extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function lab()
    {
        return $this->belongsTo(Lab::class);
    }

    public function scopeLab($query, $lab)
    {
        return $query->where('lab_id', $lab->id);
    }

    public function scopeType($query, $type)
    {
        return $query->where('type', $type);
    }

    public function isUnassigned()
    {
        return $this->user == null;
    }

    public function assignTo(User $user)
    {
        return $this->user_id = $user->id;
    }
}
