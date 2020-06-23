<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Feedbacks;

class FeedbacksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feedbacks = Feedbacks::all();
            return view('layouts.cruds.feedbacks.index', compact('feedbacks'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.cruds.feedbacks.CreateFeedbacks');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $feedbacks = new Feedbacks([
            'title' => $request->get('title'),
            'comment' => $request->get('comment'),
            'score' => $request->get('score'),
            ]);
            $feedbacks->save();

            return redirect()->route('feedbacks.index')->with('success', 'Feedback saved!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $feedback = Feedbacks::findOrFail($id);

        return view('layouts.cruds.feedbacks.DetailFeedbacks', compact('feedback'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $feedbacks = Feedbacks::findOrFail($id);
        return view('layouts.cruds.feedbacks.EditFeedbacks', compact('feedback'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $feedbacks = Feedbacks::findOrFail($id);
        $feedbacks->title = $request->input('title');
        $feedbacks->score = $request->input('score');
        $feedbacks->comment = $request->input('comment');   
        $feedbacks->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    $feedbacks = Feedbacks::findOrFail($id);
    $feedbacks->delete();

    }
}
