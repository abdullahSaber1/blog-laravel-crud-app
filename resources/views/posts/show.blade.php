@extends('layouts/app')

<form class="col-6 mx-auto my-5"> 
    @csrf
    <div class="mb-3">
      <label for="exampleInputTitle" class="form-label">Title</label>
      <input name="title" readonly value="{{$post->title}}" type="text" class="form-control alert alert-danger" id="exampleInputTitle" >
    </div>

    <div class="mb-3">
        <label for="exampleInputPosted" class="form-label">Posted By</label>
        <input name="posted_by" readonly value="{{$post->user->name}}" type="text" class="form-control alert alert-danger" id="exampleInputPosted">
      </div>


      <div class="mb-3">
        <label for="exampleInputPosted" class="form-label">Description</label>
        <textarea readonly name="description" type="text" class="form-control" id="exampleInputPosted">
          {{$post['description']}}
        </textarea>
      </div>

      <div class="mb-3"> 
        <label for="exampleInputDate" class="form-label">Created At</label>
        <input name="created_at" readonly value="{{$post['created_at']}}" type="text" class="form-control alert alert-secondary"  id="exampleInputDate">
      </div>
      </form> 

      {{-- Comments section --}}

      <div class="row d-flex justify-content-center">
        <div class="col-md-8 col-lg-6">
          <div class="card shadow-0 border" style="background-color: #f0f2f5;">
           <div class="card-body p-4">
             <div class="form-outline mb-4">

               <form method="POST" action="{{route('comments.store',['post_id'=>$post->id])}}" >
                @csrf
                  <div class="form-group">
                    <label for="exampleFormControlTextarea1">Comment</label>
                    <textarea name="body" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    <label class="form-label" for="addANote">+ Add a note</label>

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
                     <p class="small text-muted mb-0">Upvote?</p>
                     <i class="far fa-thumbs-up mx-2 fa-xs text-black" style="margin-top: -0.16rem;"></i>
                     <p class="small text-muted mb-0">3</p>
                   </div>
                 </div>
               </div>
             </div>

             @endforeach
           </div>
         </div>
       </div>
     </div>