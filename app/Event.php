<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public function city() {
       return $this->belongsTo(City::class);
    }
    public function user() {
        return $this->belongsTo(User::class);
    }
    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function joins() {
        return $this->hasMany(Join::class);
      }
}
