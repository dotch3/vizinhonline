@extends('layouts.main.app')
@section('title', 'Create Feedbacks')

@section('content')
    <div class="container">
        <div class="container row card">
            <div class=" jumbotron version_banner">
                <div class="row">
                    <h4><span
                            class="badge badge-pill badge-success">Create Feedback</span></h4>
                </div>

            </div>
        </div>
        <div class="row container card-body">
            <div class="container col-md-12 mb-3 ">
                <form class="needs-validation border border-secondary"
                      method="post" action="{{ route('feedbacks.store') }}">
                    @csrf

                    <div class="form-row container">
                        <div class="col-md-2 mb-3">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name"
                                   value="" name="name"
                                   required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="last_name">LastName</label>
                            <input type="text" class="form-control" id="last_name"
                                   value="" name="last_name"
                            >
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="rg">RG</label>
                            <input type="text" class="form-control" id="rg"
                                   value="" name="rg" required>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>

                        <div class="col-md-2 mb-3">
                            <label for="email">E-mail</label>
                            <input type="email" class="form-control" id="email"
                                   value="" name="email" required>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="form-row container">
                        <div class="col-md-4 mb-3">
                            <label for="title">Title</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="title"
                                       value="" name="title" required>
                                <div class="invalid-tooltip">
                                    Por favor digite um titulo.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="score">score</label>
                            <input type="score" class="form-control" id="score"
                                   value="" name="score" required>
                            <div class="invalid-tooltip">
                                Por favor digite uma senha .
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="comments">Comments</label>
                            <input type="text" class="form-control" id="coments"
                                   value="" name="comments"
                            >
                            <div class="invalid-tooltip">
                                Por favor digite um comentario
                            </div>
                        </div>
                    </div>
                    
                        <div class="col-md-3 mb-3">
                            <label for="created_at">Created at</label>
                            <input type="text" class="form-control" id="created_at" name="created_at"
                                   value="" disabled>
                            <div class="invalid-tooltip">
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="updated_at">Updated at</label>
                            <input type="text" class="form-control" id="updated_at" name="updated_at"
                                   value="" disabled>
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
                                    window.location.href='{{ route('feedbacks.index')}}'">Voltar</button>
                                <button class="btn btn-success btn-lg " type="submit">Create feedback</button>
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
