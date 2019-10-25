@extends('layouts.app')

@section('content')
    @if($user)
<div class="container" style="width: 80%;height:175px; border: 1px solid black; padding: 20px">
    <form action="{{route('add')}}" method="POST">
        @csrf
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title">
        </div>
        <div>
        <textarea style="width: 100%; height:75px" name="post" placeholder="Create Post"></textarea>
        </div>
        <div style="float: right">
        <input type="submit" name="add_post" value="Post!">
        </div>
    </form>
</div>
    @endif
@endsection


@section('posts')

    <div class="container" style="margin-top: 60px">
        @foreach($allPosts as $post)
        <div class="card bg-light mb-3" style="width: 95%; border: 1px solid black; margin-bottom: 30px; display: block">
            @if($user)
            @if($user->id === $post->user_id)
            <form method="post" class="float-right" action="{{route('delete',$post->id)}}" style="float: right;">
                @csrf
                @method('delete')
                <input type="submit" name="delete" value="Delete!">
            </form>
            <form method="GET" action="{{route('edit',$post->id)}}" style="float: right">
                @csrf
                <input type="submit" name="edit" value="Edit!">
            </form>
            @endif
            @endif
            <div class="card-header"><h4 >Title: {{$post->title}}</h4></div>
                <div class="card-body">
            <h5 class="card-title">Author: {{$post->user->name}}</h5>
            <p class="card-text">{{$post->body}}</p>
            @if($user)
            <form action="{{route('add_comment',$post->id)}}" method="POST">
                @csrf
                <input type="text" name="comment"placeholder="Comment" style="width: 88%">
                <input type="submit" name="comment_submit" value="Add Comment">
            </form>
            @endif
                    <div style="float: right"><a href="{{route('get_comments', $post->id)}}">view all comments</a></div>

                </div>
        </div>
    @endforeach
    </div>
@endsection
