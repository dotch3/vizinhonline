@extends('layouts.main.app')
@section('title', 'List Feedbacks')




@section('content')
    <div class="container">
        <div class=" jumbotron version_banner">
            <div class="row">
                <h4><span
                        class="badge badge-pill badge-secondary">feedbacks</span></h4>
            </div>

        </div>
    </div>
    <div class="container">
        <div class="row">
            <a href="{{route('feedbacks.create')}}" class="btn btn-success">
                Add Feedback
            </a>
        </div>
        <div class="row">
        </div>

        <div class="row container">
            <div class="table-responsive-md">
                <table class="table table-striped table-dark table-bordered table-hover table-sm">
                    <caption>List of Feedbacks</caption>
                    <thead class="thead-light">
                    <th scope="col">Id</th>
                    <th scope="col">title</th>
                    <th scope="col">score</th>
                    <th scope="col">comment</th>
{{--                    <th scope="col">Created at</th>--}}
{{--                    <th scope="col">Updated at</th>--}}
                    <th scope="col">Ação</th>
                    </thead>
                    @forelse($feedbacks as $feedbacks)
                        <tbody>
                        <tr>
                            <td>{{$feedbacks->id_feedback}}</td>
                            <td>{{$feedbacks->title}}</td>
                            <td>{{$feedbacks->score}}</td>
                            <td>{{$feedbacks->comments}}</td>
{{--                            <td>{{$feedbacks->created_at}}</td>--}}
{{--                            <td>{{$feedbacks->updated_at}}</td>--}}
                            <td>
                                <div class="row">

                                    {{-- Vamos a chamar ao controller--}}
                                    <button type="button"
                                            onclick="window.location.href='/detailsFeedbacks/{{$feedbacks->id_feedback}}'"
                                            class="btn btn-outline-primary ">Details
                                        - {{$feedbacks->id_feedback}}
                                    </button>
                                    <button type="button"
                                            onclick="window.location.href='{{ route('feedbacks.edit',$feedbacks->id_feedback)}}'"
                                            class="btn btn-outline-warning "> Edit
                                        - {{$feedbacks->id_feedback}}
                                    </button>
                                    <form class="form-inline"
                                          action="{{ route('feedbacks.destroy', $feedbacks->id_feedbacks)}}"
                                          method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="btn btn-outline-danger "> Delete
                                            - {{feedbacks->id_feedback}}
                                        </button>

                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                            <p>Nao ha Feedbacks</p>
                        </tbody>
                    @endforelse
                </table>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    @parent
@endsection
