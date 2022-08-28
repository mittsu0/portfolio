<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use App\Models\Comment;

class CommentController extends Controller
{
    public function confirm(CommentRequest $request)
    {
        $data = $request->only(['article_id', 'comment', 'can_display_id']);
        return view('comments.confirm', compact('data'));
    }

    public function store(Request $request)
    {
        $data = $request->only(['article_id', 'comment', 'can_display_id']);
        if ($request->has('back')) {
            return redirect()->route('articles.show', ['article' => $data['article_id']])->withInput();
        }
        $comment = new Comment;
        $comment->fill($data);
        $comment->fill(['uid' => $request->uid, 'ip_address' => $request->ip()])->save();
        return redirect()->route('articles.show', ['article' => $data['article_id']]);
    }
}
