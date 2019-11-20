<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class UserController extends Controller
{
    public function profile(){
        $user = Auth::user();
        return view('profile', compact('user'));
    }
    public function editProfile(Request $request){
        try {
            DB::table('users')->where('id', Auth::user()->id)->update([
                'name'=>$request->name,
                'phone'=>$request->phone,
                'email'=>$request->email,
            ]);
            return redirect()->back()->with('success', 'Changes Saved');
        }
        catch (Exception $exception){
            return redirect()->back()->with('alert', $exception->getMessage());
        }
    }
}
