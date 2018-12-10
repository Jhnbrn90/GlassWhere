<?php

namespace App;

use App\Glassware;
use Illuminate\Database\Eloquent\Model;

class Lab extends Model
{
    public function glassware()
    {
      return $this->belongsToMany(Glassware::class); 
    }
}
