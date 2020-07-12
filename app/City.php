<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function events() {
        $this->hasMany(Event::class);
    }
}
