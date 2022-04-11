@extends('layouts.app')

@section('posts')

    @section('title') Posts  @endsection
    
        <div class="mt-5">
            <a href="{{route('posts.create')}}" class="btn btn-success mb-5">Create New users</a>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Posted By</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $index=>$user)
                    <tr>
                        <th scope="row">{{$index}}</th>
                        <td>{{$user['title']}}</td>
                        <td>{{$user['posted_by']}}</td>
                        <td>{{$user['created_at']}}</td>
                        <td>
                            <a href="{{route('posts.show',['post'=> $index])}}" class="btn btn-dark mx-2">view</a>
                            <a href="{{route('posts.edit',['post'=>$index])}}" class="btn btn-primary mx-2">Edit</a>

                            <form action="{{route('posts.destroy',['post'=>$index])}}" method="post" class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button href="" onclick="return confirm('Are you sure, you want Delete?')"  class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
    </div>
    @endsection



