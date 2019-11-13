<?php

namespace App\Http\Controllers;

use App\Event;
use App\Owner;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(){
        $events = Event::all()->where('status','Active')->sortByDesc('eventDate');
        $owners = Owner::all()->sortBy('organizationName');
        return view('admin.events')->with('events',$events)->with('owners',$owners);
    }
}
