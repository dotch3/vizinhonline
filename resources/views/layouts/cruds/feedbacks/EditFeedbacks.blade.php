@extends('layouts.main.app')
@section('title', 'Edit Feedback')

@section('content')
    <div class="container">
        <div class="container row card">
            <div class=" jumbotron version_banner">
                <div class="row">
                    <h4><span
                            class="badge badge-pill badge-warning">Edit Feedback</span></h4>
                </div>

            </div>
        </div>
        <div class="row container ">
            <div class="container col-md-12 mb-3">
                <form class="needs-validation border border-secondary" method="POST"
                      action="{{ route('feedbacks.update',$feedbacks->id_feedback)}}" autocomplete="off">
                    @method('PATCH')
                    @csrf

                    <div class="form-row container">
                        <div class="col-md-2 mb-3">
                            <label for="name">ID</label>
                            <input type="text" class="form-control" id="id"
                                   value="{{$feedbacks->id_feedback}}" name="id"
                                   required>
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title"
                                   value="{{$feedbacks->title}}" name="title"
                                   required>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="score">Score</label>
                            <input type="text" class="form-control" id="score"
                                   value="{{$feedbacks->score}}" name="score" required
                            >
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="Comment">RG</label>
                            <input type="text" class="form-control" id="score"
                                   value="{{$feedbacks->comment}}" name="score" required>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>


                </form>
            </div>
        </div>
    </div>

@endsection
@section('footer')
    @parent
@endsection
