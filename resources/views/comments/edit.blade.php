@extends('layouts.postCard')

@section('posts')

<form class="col-6 mx-auto my-5" method="POST" action="{{route('comments.update',['comment' => $comment->id ])}}">
  @csrf
  @method('PUT')
  <div class="mb-3">
    <label for="exampleInputPosted" class="form-label">Posted By</label>
    <input readonly name="posted_by" value="{{$comment->user->name}}" type="text" class="form-control"
      id="exampleInputPosted">
  </div>

  <div class="mb-3">
    <label for="exampleInputPosted" class="form-label">Description</label>
    <textarea name="body" type="text" class="form-control" id="exampleInputPosted">{{$comment->body}}</textarea>

    @error('body')

    <div class="alert alert-danger"> {{$message}}</div>

    @enderror

    <div class="mb-3">
      <label for="exampleInputDate" class="form-label">Created At</label>
      <input readonly name="created_at" readonly value="{{$comment->created_at}}" type="text"
        class="form-control alert alert-secondary" id="exampleInputDate">
    </div>

  </div>

  <button type="submit" class="btn btn-success">update Comment</button>
</form>

@endsection