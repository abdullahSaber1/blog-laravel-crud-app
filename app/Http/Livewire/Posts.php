<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class Posts extends Component
{
    public function render()
    {
        $posts = Post::paginate(10);

        return view('livewire.posts',['posts'=>$posts]);
    }
    
    public function show_post($post){



    }

    public function edit_post($post){

        

    }  
      public function create_post(){


      return redirect()->to('/livewire/posts/create');

    }  
      public function delete_post($post){

        

    }

}

