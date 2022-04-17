@extends('layouts.postCard')

@section('posts')


@section('actionButton')
<a href="{{route('posts.index')}}" class="btn btn-primary ml-auto ">Posts</a>
@endsection


<form class="col-6 mx-auto my-5">
  @csrf


  <div class="mb-3">
    <strong class="text-primary">Title : {{$post->title}}</strong><br>
    <small>Posted By : {{$post->user->name}}</small>
  </div>

  @if($post->image)
  <div class="my-4 img-fluid w-sm-20 rounded mx-auto d-block">
    <img src="{{ asset('images/'.$post->image) }}" alt={{$post->title."image"}} />
  </div>
  @endif

  <div class="mb-3">
    <label for="exampleInputPosted" class="form-label">Description</label>
    <textarea readonly name="description" type="text" rows="5" class="form-control" id="exampleInputPosted">
            {{$post['description']}}
          </textarea>
  </div>
</form>

{{-- Comments section --}}

<div class="row d-flex justify-content-center">
  <div class="col-md-8 col-lg-6">
    <div class="card shadow-0 border" style="background-color: #f0f2f5;">
      <div class="card-body p-4">
        <div class="form-outline mb-4">

          <form method="POST" action="{{route('comments.store',['post_id'=>$post->id])}}">
            @csrf
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Comment</label>
              <textarea name="body" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>

              <label class="form-label" for="addANote">+ Add a note</label>

              @error('body')<div class="text-danger">{{$message}}</div>@enderror


            </div>
            <button type="submit" class="btn btn-primary">Comment</button>
          </form>
        </div>

        @foreach($post->comments as $comment)

        <div class="card mb-4">
          <div class="card-body">
            <p>{{$comment->body}}</p>

            <div class="d-flex justify-content-between">
              <div class="d-flex flex-row align-items-center">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(4).webp" alt="avatar" width="25"
                  height="25" />
                <p class="small mb-0 ms-2">{{$comment->user->name}}</p>
              </div>

              <div class="d-flex flex-row align-items-center">


                <form action="{{route('comments.destroy',['comment'=>$comment->id])}}" method="post"
                  class="d-inline-block mb-0">
                  @csrf
                  @method('DELETE')

                  <button onclick="return confirm('Are you sure, you want Delete?')" class="btn text-danger mb-0">
                    <i class="fas fa-trash-alt" style="font-size:1.3rem;"></i>
                  </button>

                </form>
                <a href="{{route('comments.edit',['comment'=>$comment->id])}}">
                  <button class="btn">
                    <i class="fas fa-edit mx-2" style="margin-top: -0.16rem; font-size:1.3rem;"></i>
                  </button>
                </a>

              </div>
            </div>
          </div>
        </div>

        @endforeach
      </div>
    </div>
  </div>
</div>

@endsection