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
                      action="{{ route('feedbacks.update',$feedback->id)}}" autocomplete="off">
                    @method('PATCH')
                    @csrf

                    <div class="form-row container">
                        <div class="col-md-2 mb-3">
                            <label for="name">ID</label>
                            <input type="text" class="form-control" id="id"
                                   value="{{$feedback->id}}" name="id"
                                   disabled>
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title"
                                   value="{{$feedback->title}}" name="title"
                                   required>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="score">Score</label>
                            <input type="text" class="form-control" id="score"
                                   value="{{$feedback->score}}" name="score" required
                            >
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="Comment">Comment</label>
                            <input type="text" class="form-control" id="comment"
                                   value="{{$feedback->comment}}" name="comment" required>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                    </div>

                    <!--Section of buttons-->
                    <div class="container">
                        <div class="row">
                            <div class="col-3">
                            </div>

                            <div class="col-6 btn-group btn-group-lg">
                                <button type="button" onclick="window.location.href='/feedbacks'"
                                        class="btn btn-outline-secondary btn-lg ">Voltar
                                </button>

                                <button type="submit" class="btn btn-warning btn-lg " type="submit">Editar</button>

                            </div>
                            <div class="col-3">
                            </div>
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
