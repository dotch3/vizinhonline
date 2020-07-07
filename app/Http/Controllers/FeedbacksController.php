<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Feedbacks;

class FeedbacksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
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
        return view('layouts.cruds.feedbacks.CreateFeedback');

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
            'title' => 'required|string|max:45',
            'comment' => 'nullable|string|max:200',
            'score' => 'nullable|integer|max:10'
        ]);

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
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $feedback = Feedbacks::findOrFail($id);

        return view('layouts.cruds.feedbacks.DetailFeedback', compact('feedback'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $feedback = Feedbacks::findOrFail($id);
        return view('layouts.cruds.feedbacks.EditFeedback', compact('feedback'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:45',
            'comment' => 'nullable|string|max:200',
            'score' => 'nullable|integer|max:10'
        ]);
        $feedbacks = Feedbacks::findOrFail($id);
        $feedbacks->title = $request->input('title');
        $feedbacks->score = $request->input('score');
        $feedbacks->comment = $request->input('comment');
        $feedbacks->save();
        return redirect()->route('feedbacks.index')->with('alert-success', 'Feedback has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $feedbacks = Feedbacks::findOrFail($id);
        $feedbacks->delete();

        return redirect()->route('feedbacks.index')->with('alert-success', 'Feedback has been deleted!');

    }
}
