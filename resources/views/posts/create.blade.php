@extends('layouts.app')

        <form class="col-6 mx-auto my-5" method="POST" action="{{route('posts.store')}}"> 
            @csrf
            <div class="mb-3">
              <label for="exampleInputTitle" class="form-label">Title</label>
              <input name="title" type="text" class="form-control" id="exampleInputTitle" >
            </div>


            <div class="mb-3">
                <label for="exampleInputPosted" class="form-label">Description</label>
                <textarea name="description" type="text" class="form-control" id="exampleInputPosted">
                </textarea>
              </div>

             <div class="mb-3">
                <label for="exampleInputDate" class="form-label">Posted By </label>
                <select name="posted_by" class="form-select" aria-label="Default select example">
                  <option selected disabled>select From Users</option>

                  @foreach($users as $user)
                  <option value="{{$user->id}}">{{$user->name}}</option>
                  @endforeach
                </select>
              </div>
           
            
            <button type="submit" class="btn btn-primary">Create Post</button>
          </form>
 