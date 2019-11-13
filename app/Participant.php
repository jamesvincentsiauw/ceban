<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    protected $fillable = [
        'eventID', 'participantID', 'participantName',
        'participantEmail','qty',
    ];

    public function events(){
        $this->belongsTo(Event::class);
    }

    public function tickets(){
        $this->hasMany(Ticket::class);
    }
}
