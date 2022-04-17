<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostrequest;
use App\Jobs\DeletePostJob;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use App\Models\UserPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    // to check Login First

    public function __construct()
    {

        $this->middleware('auth');
    }



    public function index(){

        $posts = Post::paginate(10);

        return view('posts.index',['posts'=>$posts]);
    }

    public function create(){

        $users=User::all();

        return view('posts.create',['users'=>$users]);
    }

    public function show($id){

        $post = Post::find($id);

        return view('posts.show',['post'=>$post]);

    }

    public function store(StorePostrequest $request){

        if($request->image){

        $imageName = time().'.'.$request->image->extension();  

        $request->image->move(public_path('images'), $imageName);

        }

        $post=[
            "title"       => $request->title,
            "description" => $request->description,
            "user_id"     => $request->user_id,
            'image'       => $imageName,
        ];
        // dd($post);

        Post::create($post);

         return to_route('posts.index')->with([
             'message'=>"Post created successfully",
             'alert-type'=>'success'
         ]);

    }

    public function edit($postId){

        $post=Post::find($postId);


        return view('posts.edit',['post' =>$post]);
    }



    public function update($postId,StorePostrequest $request){

        $post=Post::find($postId);

        if($request->image){

            Storage::delete('public/images/'.$post->image);
            $imageName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('images'), $imageName);

        }else{
            $imageName = $post->image;
        }

        $post->title=$request->title;

        $post->image=$imageName;

        $post->description=$request->description;
        

        $post->save();


        return to_route('posts.index');


    }


    public function destroy ($id){
        $post=Post::where('id',$id);

        if($post->image){
            Storage::delete('public/images/'.$post->image);
        }

        $post->delete();

        return to_route('posts.index');

    }

    public function removeOldPost(){
        DeletePostJob::dispatch();
        echo "Posts are deleted successfully";

    }

   
}
