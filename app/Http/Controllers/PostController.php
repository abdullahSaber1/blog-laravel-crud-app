<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{


    private $posts=[
    ['id'=> 1, 'title'=> 'MVC Pattern', "posted_by" => "Ahmed", "created_at" => "2021-05-03"],
    ['id'=> 2, 'title'=> 'Artisan Conmands', "posted_by" => "Abdallah", "created_at" => "2022-06-03"],
    ['id'=> 3, 'title'=> 'Schedule Jobs', "posted_by" => "Bondoka", "created_at" => "2000-11-03"],
    ['id'=> 4, 'title'=> 'Architecture', "posted_by" => "Ibrahim", "created_at" => "2022-02-03"],
        ];

    public function index(){
        return view('posts.index',['users'=>$this->posts]);
    }

    public function create(){
        // $this->posts.array_push($user);
        return view('posts.create');
    }

    public function show($id){

        $post=$this->posts[$id];

        return view('posts.show',['post'=>$post]);

    }

    public function store(){

      $postData=request()->all();

        $post=[
            "id"=>count($this->posts),
            "title" => request()["title"],
            "posted_by" => request()['postedby'],
            "created_at" => request()['createdat']
        ];


       array_push($this->posts,$post);

        // dd($this->posts);

        //  return redirect()->route('posts.index');

         return view('posts.index',['users' => $this->posts]);


    }

    public function edit($id){


        $post=$this->posts[$id];

        // dd('you are in Edit at Id = ',$post);


        return view('posts.edit',['post'=>$post]);
    }



    public function update($id,Request $request){

        $post=$request->all();

        $this->posts[$id]=$post;

        return view('posts.index',['users' => $this->posts]);

    }


    public function destroy ($id){

     unset($this->posts[$id]);

    return view('posts.index',['users' => $this->posts]);

    }

   
}
