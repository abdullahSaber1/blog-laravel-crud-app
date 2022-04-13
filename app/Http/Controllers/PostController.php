<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use App\Models\UserPost;
use Illuminate\Http\Request;

class PostController extends Controller
{


    // private $posts=[
    // ['id'=> 1, 'title'=> 'MVC Pattern', "posted_by" => "Ahmed", "created_at" => "2021-05-03"],
    // ['id'=> 2, 'title'=> 'Artisan Conmands', "posted_by" => "Abdallah", "created_at" => "2022-06-03"],
    // ['id'=> 3, 'title'=> 'Schedule Jobs', "posted_by" => "Bondoka", "created_at" => "2000-11-03"],
    // ['id'=> 4, 'title'=> 'Architecture', "posted_by" => "Ibrahim", "created_at" => "2022-02-03"],
    //     ];

    public function index(){
        //  $posts = Post::all();

        $posts = Post::paginate(15);




        return view('posts.index',['posts'=>$posts]);
    }

    public function create(){
        $users=User::all();


        return view('posts.create',['users'=>$users]);
    }

    public function show($id){

        $post = Post::find($id);

        $comments= $post->comments();

        // dd($comments);

        return view('posts.show',['post'=>$post]);

    }

    public function store(){


        $post=[
            "title" => request()["title"],
            "user_id" => request()['user_id'],
            "description" => request()['description'],
        ];

        Post::create($post);

         return to_route('posts.index');


    }

    public function edit($id){

        $post=Post::find($id);


        return view('posts.edit',['post' =>$post]);
    }



    public function update($id,Request $request){

        $post=Post::find($id);

        $post->title=$request->all()['title'];

        $post->description=$request->all()['description'];

        $post->save();


        return to_route('posts.index');

    }


    public function destroy ($id){

        $post=Post::where('id',$id)->delete();


        return to_route('posts.index');

    }

   
}
