<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentStoreRequest;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store($training, CommentStoreRequest $request)
    {
        $param = $request->validated();
        $param['training'] = $training;
        Comment::create($param);
        return back();
    }

    public function deleteComment ($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        return back();
    }
}
