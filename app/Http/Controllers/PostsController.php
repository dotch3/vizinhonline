<?php

namespace App\Http\Controllers;

use App\Images;
use App\Post;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Faker\Provider\Image;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        return view('layouts.cruds.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.cruds.posts.CreatePost');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string|max:100',
            'comment' => 'required|string|max:200',
            'user_id' => 'nullable|integer'
        ]);

        $post = new Post();
        $post->title = $request->title;
        $post->comment = $request->comment;

        if (empty($request->title)) {
            $post->title = Str::slug("post_" . now());
        }
        $post->save();

        //Section for the image
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            //Getting info from the image to upload
            $destinationPath = public_path('/post/');
            $imageName = Str::slug($post->id);
            $imageFormat = $request->image->clientExtension();

            $slug = Str::slug($imageName) . "." . ($imageFormat);


            // Saving the image as object into the database
            $image = new Images([
                'name' => $imageName,
                'path_location' => $destinationPath . $slug,
                'slug' => $slug,
                'format_image' => $imageFormat,
                'size_image' => $request->image->getSize(), // Get the size in Bytes
                'post_id' => $post->id
            ]);

            $location = '/public/post/';

            $path = Storage::putFileAs($location, $request->file('image'), $slug);
            if ($path) {
                $image->save();
            }

            $post->image()->save($image);
        }
        //Checking the User info
        if ($request->user_id !== null) {
            $user = User::find($request->user_id);
            if ($user) {
                $post->users()->attach($user->id);
            }

        } elseif (Auth::id()) {
            $post->users()->attach(Auth::id());
        } else {
            //HradCoded for Fernando until have auth() working
            $user = User::where('name', 'Fernando')->first();
            if ($user) {
                $post->users()->attach($user->id);
            }
        }

        $post->save();
//        $post->image()->attach($image); -> belongsToMany
//        $post->users()->attach($post->id);
        return Redirect::back()->with('alert-success', 'Post salvo corretamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('layouts.cruds.posts.DetailPost', compact('post'));
        //show user owner of the post, foreach
//        $users = $post->users()->get();
//
//        if ($users) {
//            echo "<h1> Users:</h1>";
//
//            foreach ($users as $user) {
//                echo "<p> #{$user->id} , {$user->name}</p>";
//            }
//        }


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('layouts.cruds.posts.EditPost', compact('post'));
        //show user owner of the post, foreach
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:100',
            'comment' => 'required|string|max:200',
        ]);

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $request->validate([
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);
        }

        $post = Post::find($id);
        if ($post->id !== null) {
            $post->title = $request->title;
            $post->comment = $request->comment;
            $post->save();
        }

//        $post->user_id = $request->user_id;

        //Section for the image

        if ($request->hasFile('image') && $request->file('image')->isValid()) {

            if ($post->image) {


                $image = Images::findOrFail($post->image->id);

                //Deleting the old image
                if (Storage::exists('/public/post/' . $post->image->slug)) {
                    Storage::delete('/public/post/' . $post->image->slug);
                }

                //Getting info from the image to upload
                $destinationPath = public_path('/post/');

                $image->name = Str::slug($post->title);
                $imageFormat = $request->image->clientExtension();
                $image->slug = Str::slug($image->name) . "." . ($imageFormat);
                $image->path_location = $destinationPath . $image->slug;
                $image->post_id = $post->id;

                // Saving the image as object into the database
                $location = '/public/post/';

                $path = Storage::putFileAs($location, $request->file('image'), $image->slug);
                if ($path) {
                    $image->save();
                }
                $post->image()->save($image);
            } else {
                $destinationPath = public_path('/post/');
                $imageName = Str::slug($post->title);
                $imageFormat = $request->image->clientExtension();

                $slug = Str::slug($imageName) . "." . ($imageFormat);


                // Saving the image as object into the database
                $image = new Images([
                    'name' => $imageName,
                    'path_location' => $destinationPath . $slug,
                    'slug' => $slug,
                    'format_image' => $imageFormat,
                    'size_image' => $request->image->getSize(), // Get the size in Bytes
                    'post_id' => $post->id
                ]);

                $location = '/public/post/';

                $path = Storage::putFileAs($location, $request->file('image'), $image->slug);
                if ($path) {
                    $image->save();
                }

                $post->image()->save($image);

            }

            $post->save();
        }

        return redirect()->route('posts.edit', $post->id)
            ->with('alert-success', 'You have successfully updated the post.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public
    function destroy($id)
    {
        $post = Post::findOrFail($id);
        if ($post->image) {
            $post->image->id->delete();
        }
        $post->delete();
        return redirect()->route('posts.index')->with('alert-success', 'Post has been deleted!');
    }


}
