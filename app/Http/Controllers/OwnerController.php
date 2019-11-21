<?php

namespace App\Http\Controllers;

use App\Event;
use App\Owner;
use App\Participant;
use App\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class OwnerController extends Controller
{
    public function index(){
        $owners = Owner::all();
        return view('admin.owners')->with('owners',$owners);
    }
    public function register()
    {
        if (DB::table('owners')->where('email', Auth::user()->email)->count() > 0) {
            return redirect('event/add')->with('success', 'Anda Sudah Terdaftar sebagai Owner, Mari Daftarkan Event Anda!');
        } else {
            return view('event_organizer');
        }
    }
    public function beOwner(Request $request)
    {
        try {
            $check = DB::table('owners')->where('organizationName',$request->organizationName)->first();
            if (!$check) {
                $owner = new Owner();
                $owner->email = Auth::user()->email;
                $owner->organizationPhone = $request->organizationPhone;
                $owner->location = $request->location;
                $owner->organizationName = $request->organizationName;
                $owner->save();
                return redirect()->back()->with('success', 'Selamat Anda telah dikonfirmasi menjadi Event Owner');
            }
            else{
                return redirect()->back()->with('alert', 'Perusahaan anda sudah terdaftar sebagai Event Owner');
            }
        }
        catch (Exception $exception){
            return redirect()->back()->with('alert', $exception->getMessage());
        }
    }
    public function deleteOwner($email){
        try {
            DB::table('owners')->where('email', $email)->delete();
            return redirect()->back()->with('success','Data Berhasil Dihapus!');
        }
        catch (\Exception $exception){
            return redirect()->back()->with('alert',$exception->getMessage());
        }
    }
    public function myEvents(){
        $events = Event::all()->where('status','Active')->where('email', Auth::user()->email)->sortByDesc('eventDate');
        return view('admin.events')->with('events',$events);
    }
}