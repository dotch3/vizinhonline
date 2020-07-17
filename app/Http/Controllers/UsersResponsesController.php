<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\UserResponse;
use Illuminate\Support\Facades\Auth;

/**
 * Class UsersResponsesController
 * @package App\Http\Controllers
 */
class UsersResponsesController extends Controller
{
    public function response(Request $request, $id)
    {
        $request->validate([
            'reply' => 'required|string|max:300'
        ]);
        $post = Post::find($id);
        $user = User::find(Auth::user()->id);

        if ($post && $user) {
            $response = new UserResponse();
            $response->reply = $request->reply;

            $response->user_id = $user->id;
            $response->post_id = $post->id;

            $response->save();

            $post->repliers()->attach($response->id); //Use IDs

            $post->save();

            return redirect()->route('posts.show', $id)->with('alert-success', 'Resposta enviada corretamente!');

        }
        return redirect()->route('home')->with('alert-error','Nao pode enviar resposta :( ');
    }


}
