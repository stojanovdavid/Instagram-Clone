<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function search(Request $request){
        $user = User::where('username', $request->search)->first();
        $profile = Profile::where('username', $request->search)->first();
        $followers = DB::table('user_profile')->where('following_id', $profile->user_id);
        return view('iGram.user', compact('user', 'followers'));
    }
}
