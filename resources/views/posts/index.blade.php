@extends('layouts.postCard')

@section('posts')

@section('title') Posts @endsection

@section('actionButton')
<a href="{{route('posts.create')}}" class="btn btn-success ml-auto ">Create New Post</a>
@endsection

<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Posted By</th>
                <th scope="col">Description</th>
                <th scope="col">Created At</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>

            @if ($posts == [null] or count($posts) == 0)
            <div class="alert alert-danger">
                <strong> No users Found</strong>
            </div>
            @else

            @foreach($posts as $index=>$post)
            <tr>
                <th scope="row">{{$post->id}}</th>
                <td class="col-3">{{$post['title']}}</td>

                <td>{{$post->user->name}}</td>

                <th scope="col">{{$post->description}}</th>
                <td class="col-2">{{$post->created_at->format('y-m-d')}}</td>
                <td class="col-3">
                    <a href="{{route('posts.show',['postId'=> $post->id])}}" class="btn btn-dark mx-2">view</a>
                    <a href="{{route('posts.edit',['postId'=>$post->id])}}" class="btn btn-primary mx-2">Edit</a>

                    <form action="{{route('posts.destroy',['postId'=>$post->id])}}" method="post"
                        class="d-inline-block">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Are you sure, you want Delete?')"
                            class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>

    <div class="flex justify-center items-center mt-10">
        {!! $posts->links() !!}
    </div>

</div>


@endsection