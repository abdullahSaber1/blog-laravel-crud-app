@extends('layouts.app')

        <form class="col-6 mx-auto my-5" method="POST" action="{{route('posts.update',['post' => $post->id ])}}"> 
            @csrf
            @method('PUT')
            <div class="mb-3">
              <label for="exampleInputTitle" class="form-label">Title</label>
              <input name="title" value="{{$post['title']}}" type="text" class="form-control" id="exampleInputTitle" >
            </div>
            <div class="mb-3">
                <label for="exampleInputPosted" class="form-label">Posted By</label>
                <input readonly name="posted_by" value="{{$post->user->name}}" type="text" class="form-control" id="exampleInputPosted">
              </div>


            <div class="mb-3">
              <label for="exampleInputPosted" class="form-label">Description</label>
              <textarea name="description" type="text" class="form-control" id="exampleInputPosted">
                {{$post['description']}}
           </textarea>

           <div class="mb-3"> 
            <label for="exampleInputDate" class="form-label">Created At</label>
            <input readonly name="created_at" readonly value="{{$post['created_at']}}" type="text" class="form-control alert alert-secondary"  id="exampleInputDate">
          </div>
            </div>

            
            <button type="submit" class="btn btn-success">update Post</button>
          </form>
 