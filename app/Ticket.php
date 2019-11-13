<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'eventID', 'participantID', 'ticketFile',
    ];

    protected $guarded=[
        'ticketFile',
    ];

    public function participants(){
        $this->belongsTo(Participant::class);
    }
}
