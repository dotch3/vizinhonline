<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\UserComment;

class UsersCommentsController extends Controller
{
    public function user_comment($request, $post_id, $user_id)
    {
        $request->validate([
            'new_comment' => 'required|string|max:300'
        ]);

        $post = Post::where('id', $post_id)->with(image)->get();
        dd($post);
        $user = User::find($user_id);
        if ($post && $user) {
            dd('Post and User:',$post, $user);
        }
    }
}
