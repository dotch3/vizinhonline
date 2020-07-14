<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\UserResponse;

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
        $user = User::where('name', 'Marcelo')->first(); //using hardcode to MArcelo
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
        return redirect()->route('home')->with('alert-error');
    }

    public function test()
    {
        echo "Test";
        $post = Post::where('id', 15)->first();
        echo "<p>Post {{$post->id}}</p>";

        $replier = $post->repliers()->get();
        foreach ($replier as $pu) {
            echo " <p>Replier $pu->name </p>";
        }

        $reply = $post->repliers->first()->pivot;
        echo "$reply->created_at";
        echo "$reply->udpated_at";

        dd('ReplierPivot:', $reply);


    }

    public function responseOwner($id)
    {
        $response = UserResponse::find($id);
        $user = User::where('id', $response->user_id)->first();

        return $user;
    }

}
