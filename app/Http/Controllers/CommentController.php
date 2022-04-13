<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
public function index(){
    $comments = Comment::all();

    return view('posts.show',['comments'=>$comments]);
}

public function store($post_id,Request $request){

    $post=Post::find($post_id);

    $comment=[
        "commentable_id" => $post_id,
        "commentable_type" => "App\Models\Post",
        "body" => $request->body,
        "user_id" => $post->posted_by,
    ];


    Comment::create($comment);

    return to_route('posts.show',['post'=>$post]);
}


}
