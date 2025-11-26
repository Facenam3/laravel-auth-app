<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function create(CommentRequest $commentRequest) {
        $comment = Comment::create([
            'comment' => $commentRequest['comment'],
            'user_id' => $commentRequest['user_id'],
            'post_id' => $commentRequest['post_id'],
        ]);

        $postId = $commentRequest['post_id'];

        if($comment) {
            return redirect("/posts/$postId/post");
        }
    }

    public function destroy(CommentRequest $commentRequest, $id) {
        $comment = Comment::findOrFail($id);
        $postId = $commentRequest['post_id'];
        $comment->delete();
        return redirect("/posts/$postId/post");
    }
}
