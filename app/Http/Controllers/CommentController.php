<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCommentRequest;
use App\Models\Comment;
use App\Models\Idea;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CommentController extends Controller
{
    public function store(CreateCommentRequest $request, Idea $idea)
    {
        $validated = $request->validated();

        $validated['user_id'] = auth()->id();

        $validated['idea_id'] = $idea->id;

        Comment::create($validated);

        Alert::success('Success','Comment posted successfully!' );

        return redirect()->route('ideas.show', $idea->id);
    }
}
