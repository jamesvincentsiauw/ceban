<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    protected $fillable = [
        'organizationName', 'email',
    ];

    public function events(){
        $this->hasMany(Event::class);
    }
}
