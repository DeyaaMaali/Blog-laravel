<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    //
    public function add (Request $request, $post_id) {
//        return "comment";
        $user_id = Auth::id();
        if($user_id){
        Comment::create([
            'comment' => $request->input('comment'),
            'user_id' => $user_id,
            'post_id' => $post_id
        ]);
        return redirect()->route('get_comments',$post_id);}
        else return redirect()->route("login");
    }


}
