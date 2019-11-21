<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        if (\request()->get('keyword')){
            return redirect('/search?keyword='.\request()->get('keyword'));
        }
        $events = Event::all()->sortBy('created_at')->take(3);
        return view('home2', compact('events'));
    }
    public function viewSearch(){
        $keyword = \request()->get('keyword');
        $events = DB::table('events')
            ->where('eventName','LIKE','%'.$keyword.'%')
            ->orWhere('description','LIKE','%'.$keyword.'%')->get();
        return view('search', compact('events'));
    }
}
