<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    public function store($postId, $authId, $comment){

        Comment::create([
            'user_id' => $authId,
            'post_id' => $postId,
            'comment_text' => $comment
        ]);

        return json_encode(['comment' => $authId]);
    }
    public function destroy($commentId){
        Comment::where('id', $commentId)->delete();
        return back();
    }
    public function likeComment($id){
        DB::table('comments_likes')->updateOrInsert([
            'comment_id' => $id,
            'user_id' => auth()->user()->id
        ]);
        return back();
    }
    public function storeComment($postId, $authId, $comment){

        Comment::create([
            'user_id' => $authId,
            'post_id' => $postId,
            'comment_text' => $comment
        ]);

        return json_encode(['comment' => $postId]);
    }
}
