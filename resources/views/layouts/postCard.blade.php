@extends('layouts.app')

@section('card')


<div class="row justify-content-between">
    <div class="col-12 ">
       <div class="card shadow-sm">
           <div class="card-header d-flex justify-content-between">
              <b>Posts</b> 
              @yield('actionButton')
           </div>
           <div class="card-body">

            @yield('posts')
            {{-- {{ $slot }} --}}

               
           </div>
       </div>

    </div>
</div>
@endsection
