@extends('layouts.app')

@section('content')
    <div class="container" style="width: 80%;height:175px; border: 1px solid black; padding: 20px">
        <form action="{{route('edit_post', $post->id)}}" method="POST">
            @csrf
            @method("put")
            <div>
                <label for="title">Title</label>
                <input type="text" name="title" id="title" value="{{$post->title}}">
            </div>
            <div>
                <textarea style="width: 100%; height:75px" name="post" placeholder="Create Post">{{$post->body}}</textarea>
            </div>
            <div style="float: right">
                <input type="submit" name="edit_post" value="Edit!">
            </div>
        </form>
    </div>
@endsection

@section('posts')
    <div></div>
@endsection
