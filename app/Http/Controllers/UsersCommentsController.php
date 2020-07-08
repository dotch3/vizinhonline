<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\UserComment;

class UsersCommentsController extends Controller
{
    public function user_comment(Request $request, $id)
    {
//        dd('request:', $request, $post);
        $request->validate([
            'new_comment' => 'required|string|max:300'
        ]);


        $post = Post::find($id);

        $user = User::where('name', 'Marcelo')->first(); //using hardcode to MArcelo


        if ($post && $user) {
            $userComment = new UserComment();
            $userComment->comment = $request->new_comment;

            $post->user_comments()->attach($userComment->id);

            dd($post->with('user_comments')->get());

            dd('postWithcomment:', $post);
        }
    }

    public function test()
    {
//        $post = Post::where('id', 16)->with('user_comments')->get();
        $post = Post::where('id', 16)->get()->first();

        $comments = $post->user_comments()->get();

        $v = count($comments);
        echo "<p>{{$post}}</p>";
        echo "<p> Tem  {{$v}} comments</p>";

        foreach ($comments as $c) {
            echo " <p>$c->id </p>";
        }
    }

}
