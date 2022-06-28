<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function search(Request $request){
        $user = User::where('username', $request->search)->first();
        if($user === NULL){
            return back();
        }else{
            $profile = Profile::where('username', $request->search)->first();
            $followers = DB::table('user_profile')->where('following_id', $profile->user_id);
            $following = DB::table('user_profile')->where('follower_id', $profile->user_id);
            $isFollowing = DB::table('user_profile')->where('follower_id', auth()->user()->id)->where('following_id', $profile->user_id)->get();
            return view('iGram.user.search', compact('user', 'followers', 'following', 'isFollowing'));
        }
    }
    public function view($id){
        $user = User::where('id', $id)->first();
        $profile = Profile::where('id', $id)->first();
        $followers = DB::table('user_profile')->where('following_id', $profile->user_id);
        $following = DB::table('user_profile')->where('follower_id', $profile->user_id);
        $isFollowing = DB::table('user_profile')->where('follower_id', auth()->user()->id)->where('following_id', $profile->user_id)->get();
        return view('iGram.user.view', compact('user', 'following', 'followers', 'isFollowing'));
    }
}
