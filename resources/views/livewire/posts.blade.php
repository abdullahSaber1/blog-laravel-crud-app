<div>

    @include('livewire.create-posts')

    
    @section('title') Posts  @endsection

    @section('actionButton')
    <a href="{javascript:void(0)" wire:click="create_post" class="btn btn-success ml-auto ">Create New Post</a>    
    @endsection

    @section('posts')

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
                        <a  href="{javascript:void(0)" wire:click="show_post({{$post->id}})"  class="btn btn-dark mx-2">view</a>
                        <a  href="{javascript:void(0)" wire:click="edit_post({{$post->id}})"  class="btn btn-primary mx-2">Edit</a>

                        <button href="{javascript:void(0)" wire:click="delete_post({{$post->id}})"  onclick="return confirm('Are you sure, you want Delete?')"  class="btn btn-danger">Delete</button>
                    </td>
                </tr>
            @endforeach
            @endif
            </tbody>
        </table>

        <div class="float-left">
            {!! $posts->links() !!}
            </div>
</div>

    {{-- Do your work, then step back. --}}
</div>
@endsection
