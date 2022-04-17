<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostrequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){


        //return $posts without Pagination

       // $posts=Post::all();
       
        //  return  PostResource::collection($posts);

        return  PostResource::collection(Post::paginate(10));
    }

    public function show($postId){

        $post=Post::find($postId);

        return new PostResource($post);
    }

    public function store(StorePostrequest $request){

        $post=[
            "title"       => $request->title,
            "description" => $request->description,
            "user_id"     => $request->user_id,
        ];

        $post=Post::create($post);

        return new PostResource($post);


    }
}
