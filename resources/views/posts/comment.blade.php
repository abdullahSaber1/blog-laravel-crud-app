@extends('layouts.app')

@section('comments')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3>
                            {{ $post->title }}
                        </h3>
                    </div>
                    <div class="panel-body">
                        <p>
                            {{ $post->description }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>


 

  @endsection
