<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){
        $posts = Post::all();
        $users = User::where('id', '!=', auth()->user()->id)->get();
        $following = DB::table('user_profile')->where('follower_id', auth()->user()->id)->get();
        $followedUserIds = [];
        foreach($following as $followedUser){
            $followedUserIds [] = $followedUser->following_id;
        }
        $followedUsers = [];
        foreach($followedUserIds as $followedUserId){
            $followedUsers[] = User::where('id', $followedUserId)->first();
        }
        return view('iGram.feed', compact('posts', 'followedUsers', 'users'));
    }
}
