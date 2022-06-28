<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LikeController extends Controller
{
    public function likePost($id){
        Like::updateOrCreate([
            'post_id' => $id,
            'user_id' => auth()->user()->id
        ]);
        return back();
    }
    public function unlikePost($id){
        Like::where('post_id', $id)->where('user_id', auth()->user()->id)->delete();
        return back();
    }

}
