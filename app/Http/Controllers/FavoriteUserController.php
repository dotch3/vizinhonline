<?php

namespace App\Http\Controllers;

use App\Favorite;
use App\FavoriteUser;
use App\Item;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $favoritesUser = FavoriteUser::all();

        return view('layouts.views.cruds.favorites.indexFavoritesUser', compact('favoritesUser'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function createPost($user_id = null)
    {

        $users = null;
        $user = User::where('name', 'Fernando')->first();
        if (!$user_id) {
            $users = User::all();
        } else {
            $user = User::find($user_id);
        }

        $items = Item::all();
        $posts = Post::all();
        return view('layouts.cruds.favorites.CreateUserFavorite',
            [
                'user' => $user, 'users' => $users,
                'items' => $items,
                'posts' => $posts
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function storePost(Request $request)
    {
        $post = Post::find($request->post_id);

//        $user_id=Auth::user()->id;
        $user = User::find($request->user_id);

        $favorite = Favorite::Where('name', 'POST_FAVORITE')->first(); //TODO: Add logic for resources {ITEM, USER}


        if ($post && $user && $favorite) {
            //all elements of a post favorite exists
            $matchQuery = [
                'post_id' => $post->id,
                'favorite_id' => $favorite->id,
                'user_id' => $user->id,
            ];

            $exist = FavoriteUser::where($matchQuery)->get();
//            FavoriteUser::where($matchQuery)->get()->count();ct
            if (count($exist) > 0) {
//                dd('Exist:', $exist, $post->id, $user->id, $favorite->id);
                return redirect()->route('posts', $user->id)
                    ->with('alert-error', '[Favorito ja existe!]');
//                    ->withErrors($favorite->id)
//                    ->withInput();
            } else {
//                dd('Do not Exist:', $post->id, $user->id, $favorite->id,count($exist));
//            }
                $favoriteUser = new FavoriteUser();

                $favoriteUser->favorite_id = $favorite->id;
                $favoriteUser->user_id = $user->id;
                $favoriteUser->post_id = $post->id;

                $favoriteUser->save();
//            dd('Favorite:',$favoriteUser);
                $user->favorites()->attach($favoriteUser->id);
                $user->save();
            }
        }

//        $item->images()->attach($image->id);
        return redirect()->route('posts', $user->id)
            ->with('alert-success', 'Favorito salvo exitosamente!');
    }

    public function savePostFavorite(Request $request)
    {
        $post = Post::find($request->post_id);
//        dd($request);
//        $user_id=Auth::user()->id;
        if (!empty(Auth::user()->id)) {
            $user = User::find($request->user_id);
//            dd('Auth?', $user);
        } else {
            $user = User::find(4); //TODO: Work with Auth()
//            dd('HardCode',$user);
        }

        $favorite = Favorite::Where('name', 'POST_FAVORITE')->first(); //TODO: Add logic for resources {ITEM, USER}

//        dd($request);
        if ($post && $user && $favorite) {
            //all elements of a post favorite exists
            $matchQuery = [
                'post_id' => $post->id,
                'favorite_id' => $favorite->id,
                'user_id' => $user->id,
            ];

            $exist = FavoriteUser::where($matchQuery)->get();
            if (count($exist) > 0) {

                return redirect()->route('posts', $user->id)
                    ->with('alert-error', '[Favorito ja existe!]');

            } else {

                $favoriteUser = new FavoriteUser();

                $favoriteUser->favorite_id = $favorite->id;
                $favoriteUser->user_id = $user->id;
                $favoriteUser->post_id = $post->id;

                $favoriteUser->save();
                $user->favorites()->attach($favoriteUser->id);
                $user->save();
            }
        }


        return redirect()->route('favorites', $user->id)
            ->with('alert-success', 'Favorito salvo exitosamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function editPost($id)
    {
        return view('layouts.cruds.favorites.CreateUserFavorite');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function updatePost(Request $request, $id)
    {
        return view('layouts.cruds.favorites.CreateUserFavorite');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroyPost($id)
    {
        $favoriteUser = FavoriteUser::findOrFail($id);
        $favoriteUser->delete();
        return redirect()->route('home')
            ->with('alert-sucess', 'Eliminado de favoritos');
    }

}
