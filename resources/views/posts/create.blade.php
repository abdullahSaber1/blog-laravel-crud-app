@extends('layouts.postCard')

@section('posts')

@section('actionButton')
<a href="{{route('posts.index')}}" class="btn btn-primary ml-auto ">Posts</a>
@endsection

<form class="col-9 mx-auto my-5" method="POST" action="{{route('posts.store')}}" enctype="multipart/form-data">
  @csrf
  <div class="mb-3">
    <label for="exampleInputTitle" class="form-label">Title</label>
    <input name="title" type="text" value="{{old('title')}}" class="form-control" id="exampleInputTitle">

    @error('title')<span class="text-danger">{{$message}}</span>@enderror
  </div>


  <div class="mb-3">
    <label for="exampleInputPosted" class="form-label">Description</label>
    <textarea name="description" rows="5" type="text" class="form-control" id="exampleInputPosted">
                  {{old('description')}}
                </textarea>
    @error('description')<span class="text-danger">{{$message}}</span> @enderror
  </div>

  <div class="mb-3">
    <label for="exampleInputDate" class="form-label">Posted By </label>
    <select name="user_id" class="form-select" aria-label="Default select example">
      <option selected disabled>select From Users</option>
      @foreach($users as $user)
      <option value="{{$user->id}}" {{old('user_id')==$user->id ? 'selected' : ""}}>{{$user->name}}</option>
      @endforeach
    </select>
    @error('user_id')<span class="text-danger">{{$message}}</span> @enderror
  </div>

  {{-- Do not forget form-encrypted in form header --}}

  <div class="mb-3">
    <label for="image" class="form-label">Image</label>
    <input name="image" type="file" class="custom-file" id="image" />
    @error('image')<span class="text-danger">{{$message}}</span> @enderror
  </div>

  <div class="text-center">
    <button type="submit" class="btn btn-primary">Create Post</button>

  </div>


</form>
@endsection