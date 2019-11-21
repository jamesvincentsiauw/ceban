<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    protected $fillable = [
        'organizationName', 'email',
    ];
    public $incrementing = false;
    public function events(){
        $this->hasMany(Event::class);
    }
}
