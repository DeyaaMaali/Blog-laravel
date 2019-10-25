@extends('layouts.app')

@section('content')
    <div></div>
@endsection


@section('posts')
    <h1>{{$user->name}} Dashbord!</h1>
    <div class="container" style="margin-top: 60px">
        @foreach($allPosts as $post)
            <div class="card bg-light mb-3" style="width: 95%; border: 1px solid black; margin-bottom: 30px;display: block">
                @if($user->id === $post->user_id)
                    <form method="post" action="{{route('delete',$post->id)}}" style="float: right">
                        @csrf
                        @method('delete')
                        <input type="submit" name="delete" value="Delete!">
                    </form>
                    <form method="GET" action="{{route('edit',$post->id)}}" style="float: right">
                        @csrf
                        <input type="submit" name="edit" value="Edit!">
                    </form>
                @endif
                <div class="card-header" ><h4>Title: {{$post->title}}</h4></div>
                    <div class="card-body">
                        <h5 class="card-title">Author: {{$post->user->name}}</h5>
                        <p class="card-text">{{$post->body}}</p>
                @if($user)
                    <form action="{{route('add_comment',$post->id)}}" method="POST">
                        @csrf
                        <input type="text" name="comment"placeholder="Comment">
                        <input type="submit" name="comment_submit" value="Add Comment">
                    </form>
                @endif
                <div style="float: right"><a href="{{route('get_comments', $post->id)}}">view all comments</a></div>
            </div>
            </div>
        @endforeach
    </div>
@endsection
