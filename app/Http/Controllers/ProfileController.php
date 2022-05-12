<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function index(){
        $followers = DB::table('user_profile')->where('following_id', auth()->user()->id);
        $following = DB::table('user_profile')->where('follower_id', auth()->user()->id);
        return view('iGram.profile', compact('followers', 'following'));
    }
    
    public function followProfile($followerId, $followedId, $val){
        DB::table('user_profile')->updateOrInsert([
            'follower_id' => $followerId,
            'following_id' => $followedId
        ]);
        return "The one that is followed is $followedId and the one that follows is $followerId" ;
    }
}
