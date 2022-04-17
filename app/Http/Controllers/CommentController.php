<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
        

    public function store($post_id,Request $request){

        $post=Post::find($post_id);

        $comment=[
            "commentable_id" => $post_id,
            "commentable_type" => "App\Models\Post",
            "body" => $request->body,
            "user_id" => $post->user_id,
        ];


        Comment::create($comment);

        return to_route('posts.show',['post'=>$post]);
    }


    public function edit($comment){

        $comment=Comment::find($comment);

        return view('comments.edit',['comment'=>$comment]);
    }


    public function update($comment,Request $request){

        $comment=Comment::find($comment);

        $comment->body=$request->body;

        $comment->save();

        return to_route('posts.show',['post'=>$comment->commentable]);
    }


    public function destroy($comment){

        $comment=Comment::find($comment);

        $comment->delete();

        return to_route('posts.show',['post'=>$comment->commentable]);
    }



}
