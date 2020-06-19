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
        foreach ($feedbacks as $key => $value) {
            echo $value;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
