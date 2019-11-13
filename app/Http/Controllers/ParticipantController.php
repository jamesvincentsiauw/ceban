<?php

namespace App\Http\Controllers;

use App\Event;
use App\Participant;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ParticipantController extends Controller
{
    private function isVerified($id){
        $user = DB::table('participants')->where('participantID',$id);
        if ($user){
            return $user->get('verified');
        }
        else{
            return false;
        }
    }
    public function purchase($id){
        $event = Event::all()->where('eventID',$id)->first();
        return view('admin.purchase', compact('event'));
    }
    public function purchaseTicket(Request  $request, $id){
        try{
            $participantID = Str::random(20);
            $participant = new Participant();
            $participant->eventID = $id;
            $participant->participantID = $participantID;
            $participant->participantName = Auth::user()->name;
            $participant->participantEmail = Auth::user()->email;
            $participant->phone = $request->phone;
            $participant->qty = $request->qty;
            $participant->save();
            return redirect()->back()->with('success','Berhasil Membeli Tiket. ID ANDA: '.$participantID);
        }
        catch (\Exception $exception){
            return redirect()->back()->with('alert', $exception->getMessage());
        }
    }
    public function verifyPurchase($id){
        try {
            $user = DB::table('participants')->where('participantID', $id);
            $user->update([
                'verified' => true
            ]);
            return redirect()->back()->with('success','verifikasi untuk pembayaran '.$id.' atas nama '.$user->get('participantName').' terverifikasi');
        }
        catch (\Exception $exception){
            return redirect()->back()->with('alert', $exception->getMessage());
        }
    }
    public function myTicket(){
        $data = DB::table('participants')->join('events','participants.eventID', '=','events.eventID')->where('participantEmail', Auth::user()->email)->get();
        return view('admin.mytickets',compact('data'));
    }
//    public function getTicket($id){
//        try{
//            if ($this->isVerified($id)){
//                $user = DB::table('participants')->where('participantID', $id);
//                $event = DB::table('events')->where('eventID',$user->get('eventID'));
//                $pdf = PDF::loadView('tes',compact($user,$event));
//                return $pdf->download('tiket.pdf');
//            }
//            else{
//                return redirect()->back()->with('alert','You are not Verified!');
//            }
//        }
//        catch (\Exception $exception){
//            return redirect()->back()->with('alert', $exception->getMessage());
//        }
//    }
}
