@extends('layouts.app')

@section('content')
    <div class="container">
<div class="card bg-light mb-3" style="width: 95%; border: 1px solid black; margin-bottom: 30px;">

    <div class="card-header"><h4>Title: {{$post->title}}</h4></div>
    <div class="card-body">
    <h5 class="card-title">Author: {{$post->user->name}}</h5>
    <p class="card-text">{{$post->body}}</p>
{{--    <h1>{{$comments}}</h1>--}}
    <div style="width: 95%; border: 1px solid black; margin-bottom: 30px; padding: 20px">
        @if($comments!="[]")
        <ul>
        @foreach($comments as $comment)

            <li>{{$comment->user->name}}:{{$comment->comment}}</li>

        @endforeach
        </ul>
        @else
           No Comments!
        @endif
        <form action="{{route('add_comment',$post->id)}}" method="POST">
            @csrf
            <input class="form-control" type="text" name="comment"placeholder="Comment" style="width: 85%; display:inline; margin-top: 15px">
            <input class="btn btn-primary" type="submit" name="comment_submit" value="Add Comment">
        </form>
    </div>
    </div>

</div>
    </div>
@endsection


@section('posts')
<div></div>
@endsection
