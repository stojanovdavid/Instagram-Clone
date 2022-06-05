<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

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
}
