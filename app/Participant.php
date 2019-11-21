<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    protected $fillable = [
        'eventID', 'participantID', 'participantName',
        'participantEmail','qty','ticketFile'
    ];
    public $incrementing = false;
    public function events(){
        $this->belongsTo(Event::class);
    }
}
