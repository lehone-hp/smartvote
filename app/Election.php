<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Election extends Model
{

    public function candidates() {
        return $this->hasMany('App\Candidate');
    }

}
