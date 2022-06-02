<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function index(){
        $following = DB::table('user_profile')->where('follower_id', auth()->user()->id)->get();
        $followers = DB::table('user_profile')->where('following_id', auth()->user()->id)->get();
        $followedByUserIds = [];
        foreach($followers as $key => $follow){
            $followedByUserIds[$key] = $follow->follower_id;
        }
        $followedByUsers = [];
        foreach($followedByUserIds as $key => $followedUser){
            $followedByUsers[] = User::where('id', $followedUser)->first();
        }        

        $followingUserIds = [];
        foreach($following as $key => $follow){
            $followingUserIds[$key] = $follow->following_id;
        }
        $followingUsers = [];
        foreach($followingUserIds as $key => $followedUser){
            $followingUsers[] = User::where('id', $followedUser)->first();
        }

        $posts = Post::where('user_id', auth()->user()->id)->get();

        return view('iGram.profile.index', compact('followers', 'following', 'followedByUsers', 'followingUsers', 'posts'));
    }
    
    public function followProfile($followerId, $followedId, $val){
        DB::table('user_profile')->updateOrInsert([
            'follower_id' => $followerId,
            'following_id' => $followedId
        ]);
        return "The one that is followed is $followedId and the one that follows is $followerId" ;
    }
    public function edit($id){
        $user = User::where('id', $id)->first();
        return view('iGram.profile.edit', compact('user'));
    }
    public function update(Request $request, $id){
        if($request->has('image')){
            $newImage = time() . '-' . $request->name . '.' . $request->image->extension();
            $request->image->move(public_path('css/images'), $newImage);
            User::where('id', $id)->update([
                'imageUrl' => $newImage,
                'bio' => $request->bio
            ]);
        }else{
            User::where('id', $id)->update([
                'bio' => $request->bio
            ]);
        }

        return redirect()->route('myProfile');
    }
}
