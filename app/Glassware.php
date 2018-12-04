<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Glassware extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
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
