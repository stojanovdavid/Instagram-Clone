<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index($id){
        $post = Post::where('id', $id)->first();
        return view('iGram.posts.index', compact('post'));
    }

    public function create(){
        return view('iGram.posts.create');
    }
    public function store(Request $request){
        $newImage = time() . '-' . $request->name . '.' . $request->postImageUrl->extension();
        $request->postImageUrl->move(public_path('css/images'), $newImage);
        Post::create([
            'user_id' => auth()->user()->id,
            'imageUrl' => $newImage,
            'caption' => $request->caption
        ]);

        return redirect()->route('profile');
    }
}
