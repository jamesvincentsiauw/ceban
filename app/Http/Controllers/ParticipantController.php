<?php

namespace App\Http\Controllers;

use App\Event;
use App\Participant;
use App\Ticket;
use App\User;
use QrCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use PDF;

class ParticipantController extends Controller
{
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
            $participant->verified = true;
            $participant->save();

            DB::table('participants')->where('participantID', $participantID)->update([
                'ticketFile' => $this->generateQR($participantID)
            ]);
            DB::table('events')->where('eventID', $id)->decrement('availableMaximumTicket', $request->qty);
            return redirect()->back()->with('success','Berhasil Membeli Tiket. ID ANDA: '.$participantID);
        }
        catch (\Exception $exception){
            return redirect()->back()->with('alert', $exception->getMessage());
        }
    }
    public function myTickets(){
        $data = DB::table('participants')->join('events','participants.eventID', '=','events.eventID')->where('participantEmail', Auth::user()->email)->get();
        return view('mytickets',compact('data'));
    }
    public function generateTicket($id){
        $participant = Participant::all()->where('participantID',$id)->first();
//        $qr_code = $participant->first()->ticketFile;
////        $data = ['participant'=>$participant,'qr_code'=>$qr_code];
////        $pdf = PDF::loadview('pdf',$data);
////        return $pdf->download('ticket.pdf');
//        $file = asset($qr_code);
//        $name = basename($file);
//        return response()->download($file, $name);
        $user = User::all()->find($id);

        $pdf = PDF::loadView('pdf', compact('participant'));
        return $pdf->download('Ticket.pdf');
    }
    private function generateQR($id){
        $ticket = Participant::all()->where('participantID',$id)->first();
        $path = '/tickets/'.$ticket->participantID.'.png';
        \QrCode::size(500)
            ->format('png')
            ->generate($ticket->participantID, public_path($path));
        return $path;
    }
}
