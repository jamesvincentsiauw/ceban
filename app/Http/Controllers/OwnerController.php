<?php

namespace App\Http\Controllers;

use App\Event;
use App\Owner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Mockery\Exception;

class OwnerController extends Controller
{
    public function index(){
        $owners = Owner::all();
        return view('admin.owners')->with('owners',$owners);
    }
    public function beOwner(Request $request)
    {
        try {
            $check = DB::table('owners')->where('organizationName',$request->organizationName)->first();
            if (!$check) {
                $owner = new Owner();
                $owner->email = Auth::user()->email;
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
    public function addEvent(Request $request){
        try {
            $validator = Validator::make($request->all(), [
                'poster' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'eventName' => 'required|string|max:50',
                'eventDate' => 'required|date'
            ]);
            if ($validator->fails()) {
                return redirect()->back()->with('error', $validator->getMessageBag()->first());
            }
            $companyName = DB::table('owners')->where('email',Auth::user()->email)->first();
            $file = $request->file('poster');
            $fileName = $file->getClientOriginalName();
            $dest_path = 'uploads/image/'.$companyName->organizationName;


            $event = new Event();
            $event->eventID = Str::random(10);
            $event->poster = $dest_path . '/' . $fileName;
            $event->eventName = $request->eventName;
            $event->location = $request->location;
            $event->category = $request->category;
            $event->price = "Rp " . number_format($request->price,2,',','.');
            $event->organizationName = $companyName->organizationName;
            $event->eventDate = $request->eventDate;
            $event->availableMaximumTicket = $request->availableMaximumTicket;
            $event->status = 'Active';
            $event->save();
            $file->move($dest_path, $fileName);

            return redirect()->back()->with('success','Selamat Event Anda telah terdaftar!');
        }
        catch (\Exception $exception){
            return redirect()->back()->with('alert',$exception->getMessage());
        }
    }

    public function editEvent($id,Request $request){
        try {
            $validator = Validator::make($request->all(), [
                'eventName' => 'required|string|max:50',
                'eventDate' => 'required|date'
            ]);
            if ($validator->fails()) {
                return redirect()->back()->with('error', $validator->getMessageBag()->first());
            }
            if ($request->hasFile('poster')){
                $companyName = DB::table('Owner')->select('organizationName')->where('email', Auth::user()->email)->first();
                $file = $request->file('poster');
                $fileName = $file->getClientOriginalName();
                $dest_path = 'uploads/image/'.$companyName;
                DB::table('events')->where('eventID', $id)->update([
                    'poster' => $dest_path.'/'.$fileName
                ]);
                $file->move($dest_path, $fileName);
            }
            DB::table('events')->where('eventID', $id)->update([
                'eventName' => $request->eventName,
                'eventDate' => $request->eventDate,
                'availableMaximumTicket' => $request->maxTicket
            ]);
            return redirect()->back()->with('success','Data Berhasil Diubah!');
        }
        catch (\Exception $exception){
            return redirect()->back()->with('alert',$exception->getMessage());
        }
    }

    public function deleteEvent($id){
        try {
            $event = DB::table('events')->where('eventID', $id);
            $event->delete();
            return redirect()->back()->with('success','Data Berhasil Dihapus!');
        }
        catch (\Exception $exception){
            return redirect()->back()->with('alert',$exception->getMessage());
        }
    }
}