<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    public function personal_info()
    {
        return $this->belongsTo('App\PersonalInfo', 'user_id', 'id');
    }
}
