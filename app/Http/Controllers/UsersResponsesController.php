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

//        dd('values',$user,$post, $request,$id);
        if ($post && $user) {
            $response = new UserResponse();
            $response->reply = $request->reply;

            $response->user_id = $user->id;
            $response->post_id = $post->id;

            $response->save();

            $post->repliers()->attach($response->id); //Use IDs

//
//            $post->repliers()->detach(); //Remove ALL
//
//            $post->repliers()->detach($response->id); //Use IDs
//
//            $post->repliers()->sync($response->id); // Use sync


//            dd('test',$post->with('user_comments')->get());
//            dd($user);
            $post->save();
//            dd('post',$post);
            return redirect()->route('home')->with('alert-success', 'Resposta enviada corretamente!');

        }
        return redirect()->route('home')->with('alert-error','Nao pode enviar resposta :( ');
    }


}
