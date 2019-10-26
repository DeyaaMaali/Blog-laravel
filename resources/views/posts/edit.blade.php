@extends('layouts.app')

@section('content')
    <div class="container card bg-light mb-3" style="width: 80%;height:225px; border: 1px solid black; padding: 20px">
        <form action="{{route('edit_post', $post->id)}}" method="POST">
            @csrf
            @method("put")
            <div>
                <label for="title">Title</label>
                <input class="form-control" type="text" name="title" id="title" value="{{$post->title}}" style="display: inline; width: 15%; margin-bottom: 20px">
            </div>
            <div>
                <textarea class="form-control" style="width: 100%; height:75px; margin-bottom: 20px" name="post" placeholder="Create Post">{{$post->body}}</textarea>
            </div>
            <div style="float: right">
                <input type="submit" name="edit_post" value="Edit!" class="btn btn-primary">
            </div>
        </form>
    </div>
@endsection

@section('posts')
    <div></div>
@endsection
