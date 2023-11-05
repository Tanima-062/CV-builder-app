<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonalInfo extends Model
{
    public function educations()
    {
        return $this->hasMany('App\Education', 'user_id','id');
    }
    public function experiences()
    {
        return $this->hasMany('App\Experience', 'user_id','id');
    }
    public function skills()
    {
        return $this->hasMany('App\Skill', 'user_id','id');
    }
    public function hobbys()
    {
        return $this->hasMany('App\Hobby', 'user_id','id');
    }
    public function social_links()
    {
        return $this->hasMany('App\SocialLink', 'user_id','id');
    }
}
