<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'eventID', 'poster', 'eventName',
        'organizationName','eventDate',
        'availableMaximumTicket','status',
    ];
    public function owners(){
        $this->belongsTo(Owner::class);
    }
    public function participants(){
        $this->hasMany(Participant::class);
    }
}
