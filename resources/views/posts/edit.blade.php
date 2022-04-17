@extends('layouts.postCard')

@section('posts')

@section('actionButton')
<a href="{{route('posts.index')}}" class="btn btn-primary ml-auto ">Posts</a>
@endsection

<form class="col-9 mx-auto my-5" method="POST" action="{{route('posts.update',['postId' => $post->id ])}}">
  @csrf
  @method('PUT')

  <div class="mb-3">
    <label for="exampleInputTitle" class="form-label">Title</label>
    <input name="title" value="{{old('title',$post->title)}}" type="text" class="form-control" id="exampleInputTitle">
    @error('title')<span class="text-danger">{{$message}}</span>@enderror

  </div>
  <div class="mb-3">
    <label for="exampleInputPosted" class="form-label">Posted By</label>
    <input readonly name="posted_by" value="{{$post->user->name}}" type="text" class="form-control"
      id="exampleInputPosted">
  </div>


  <div class="mb-3">
    <label for="exampleInputPosted" class="form-label">Description</label>
    <textarea name="description" type="text" class="form-control" rows="5"
      id="exampleInputPosted">{{old('description',$post->description)}}</textarea>
    @error('description')<span class="text-danger">{{$message}}</span>@enderror
  </div>

  <div class="mb-3">
    <label for="exampleInputDate" class="form-label">Created At</label>
    <input readonly name="created_at" readonly value="{{$post->created_at}}" type="text"
      class="form-control alert alert-secondary" id="exampleInputDate">
  </div>


  {{-- @if($post->image != '')
  <div class="form-group">
    <img src="{{asset('assets/images/'. $post->image)}}" alt="{{ $post->title }}" width="188">
  </div>
  @endif

  <div class="form-group">
    <label for="image">Image</label>
    <input type="file" name="image" class="custom-file">
    @error (image )<span class="text-danger">{{ $message }}</span>@enderror

  </div> --}}

  <div class="text-center">

    <button type="submit" class="btn btn-primary">update Post</button>
  </div>
</form>
@endsection