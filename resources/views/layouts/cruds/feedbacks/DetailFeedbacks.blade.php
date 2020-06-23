@extends('layouts.main.app')
@section('title', 'Details Feedbacks')

@section('content')
    <div class="container">
        <div class="container row card">
            <div class=" jumbotron version_banner">
                <div class="row">
                    <h4><span
                            class="badge badge-pill badge-secondary">Details Feedbacks</span></h4>
                </div>

            </div>
        </div>
        <div class="row container ">
            <div class="container col-md-12 mb-3">
                <form class="needs-validation border border-secondary">
                    <div class="form-row container">
                        <div class="col-md-2 mb-3">
                            <label for="name">Title</label>
                            <input type="text" class="form-control" id="title"
                                   value="{{$feedback->title}}" name="title"
                                   required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="last_name">Score</label>
                            <input type="text" class="form-control" id="score"
                                   value="{{$feedback->score}}" name="score"
                            >
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="rg">Comments</label>
                            <input type="comment" class="form-control" id="comment"
                                   value="{{$feedback->comment}}" name="comment" required>

                        </div>

                       
                        <div class="col-md-3 mb-3">
                            <label for="created_at">Created at</label>
                            <input type="text" class="form-control" id="created_at" name="created_at"
                                   value="{{$feedback->created_at}}" disabled>
                            <div class="invalid-tooltip">
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="updated_at">Updated at</label>
                            <input type="text" class="form-control" id="updated_at" name="updated_at"
                                   value="{{$feedback->updated_at}}" disabled>
                            <div class="invalid-tooltip">
                            </div>
                        </div>
                    </div>
                    <div class="form-row container">

                    </div>

                    <div class="container">
                        <div class="row">
                            <div class="col-3">
                            </div>

                            <div class="col-6 btn-group btn-group-lg">
                                <button type="button" class="btn btn-secondary btn-lg " onclick="
                                    window.location.href='{{ route('feedbacks.index')}}'"
                                >Voltar
                                </button>

                                {{--                                <button class="btn btn-success btn-lg " type="submit">Create Feedback</button>--}}

                                {{--                            <button class="btn btn-outline-danger btn-lg " type="submit">Delete</button>--}}
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
