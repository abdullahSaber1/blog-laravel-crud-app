@extends('layouts/app')

<form class="col-6 mx-auto my-5"> 
    @csrf
    <div class="mb-3">
      <label for="exampleInputTitle" class="form-label">Title</label>
      <input name="title" readonly value="{{$post['title']}}" type="text" class="form-control alert alert-danger" id="exampleInputTitle" >
    </div>


    <div class="mb-3">
        <label for="exampleInputPosted" class="form-label">Posted By</label>
        <input name="posted_by" readonly value="{{$post['posted_by']}}" type="text" class="form-control alert alert-danger" id="exampleInputPosted">
      </div>

      <div class="mb-3">
        <label for="exampleInputDate" class="form-label">Created At</label>
        <input name="created_at" readonly value="{{$post['created_at']}}" type="date" class="form-control alert alert-secondary"  id="exampleInputDate">
      </div>
      </form>