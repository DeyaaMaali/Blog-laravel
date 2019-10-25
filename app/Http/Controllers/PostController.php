<?php

namespace App\Http\Controllers;

use App\User;
use App\Post;
use App\Comment;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    //
    public function index () {
        $user_id = Auth::id();
//        return $user_id;
//        $user = User::findOrFail($user_id);
//        $allPosts=$user->posts()->get();
        $user = User::find($user_id);
//        $allPosts=Post::all()->with('user');
        $allPosts=Post::with('user')->get();

//        return $allPosts;

        return view("posts.index",compact('allPosts','user'));
    }

    public function add (Request $request) {
        $user_id = Auth::id();
        $user = User::findOrFail($user_id);
        $author = $user->name;
        $title = $request->input('title');
        Post::create([
            'title' => $request->input('title'),
            'user_id' => $user_id,
            'body' => $request->input('post')
        ]);
        return redirect()->route('homepage');
//        dd($request);
//        return "Created";
//        dd($request);

//        return view("posts.index");
    }

    public function getcomments ($post_id) {
//        return $post_id;
//        $post = Post::with('comments')->where('id',$post_id)->get();
        $post = Post::findOrFail($post_id);
//        return $post;
        $comments = $post->comments()->with('user')->get();
//        return $comments;
        return view("posts.detail", compact("post","comments"));
        return $comments;
        return dd($comments);
        $post = Post::with('comments')->where('id',$post_id)->get();

//        $comm =
//        return redirect()->route('homepage');
        return view("posts.detail", compact("post"));
    }

    public function delete ($post_id) {
        $post = Post::find($post_id);
        if($post->user_id ===Auth::id()){
        Post::destroy($post_id);
//        return "deleted successfully";
        return redirect()->route('homepage');}
        else return "Stop it Hacker!";
    }

    public function edit ($post_id){
        $post = Post::findOrFail($post_id);

        return view("posts.edit", compact('post'));
    }

    public function editpost (Request $request, $post_id){
//        return "edit post";
        $post = Post::findOrFail($post_id);
        $post->update([
            'title'  => $request->input('title'),
            'body' => $request->input('post')
        ]);
        return redirect()->route('homepage');
    }

    public function profile(){
        $user_id = Auth::id();
        $user = User::findOrFail($user_id);
        $allPosts=$user->posts()->get();

        return view("profile.index",compact('allPosts','user'));
    }
}
