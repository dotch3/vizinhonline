@extends('layouts.main.app')
@section('title', 'Lists de Feedbacks')




@section('content')
    @if (session('alert-success'))
        <div class="container alert alert-success" role="alert">
            {{session('alert-success')}}
        </div>
    @endif
    @if ($errors)
        @foreach ($errors->all as $error)
            <div class="alert alert-danger" role="alert">
                {{$error}}
            </div>
        @endforeach
    @endif
    <div class="container">
        <div class=" jumbotron version_banner">
            <div class="row">
                <h4><span
                        class="badge badge-pill badge-secondary">feedbacks</span></h4>
            </div>

        </div>
    </div>
    <div class="container">
        <div class="container-fluid" style="text-align:center;">
            <a href="{{route('feedbacks.create')}}" class="btn btn-success">
                Criar Feedback
            </a>
        </div>
        <div class=" container-fluid">
            <div class="table-responsive-lg">
                <table class="table table-bordered table table-striped text-center">
                    <caption>Lists de Feedbacks</caption>
                    <thead class="thead-light">
                    <th scope="text-center">Id</th>
                    <th scope="text-center">title</th>
                    <th scope="text-center">score</th>
                    <th scope="text-center">comment</th>
                    {{--                    <th scope="col">Created at</th>--}}
                    {{--                    <th scope="col">Updated at</th>--}}
                    <th scope="text-center">Ação</th>
                    </thead>
                    @forelse($feedbacks as $feedbacks)
                        <tbody>
                        <tr>
                            <td>{{$feedbacks->id}}</td>
                            <td>{{$feedbacks->title}}</td>
                            <td>{{$feedbacks->score}}</td>
                            <td>{{$feedbacks->comment}}</td>
                            {{--                            <td>{{$feedbacks->created_at}}</td>--}}
                            {{--                            <td>{{$feedbacks->updated_at}}</td>--}}
                            <td>
                                <div class="container-fluid ">
                                    <a class="btn btn-outline-info btn-rounded my-0"
                                       href="{{ route('feedbacks.show',$feedbacks->id)}}">
                                        <i class="fa fa-eye" aria-hidden="true"></i></a>

                                    <a class="btn btn-outline-warning btn-rounded  my-0"
                                       href="{{ route('feedbacks.edit',$feedbacks->id)}}
                                           "><i class="fa fa-pencil" aria-hidden="true" title="Editar"></i></a>
                                    <!--Delete section-->
                                    <form method="post" id="delete-form-{{$feedbacks->id}}"
                                          action="{{ route('feedbacks.destroy', $feedbacks->id)}}"
                                          style="display:none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    <button onclick="if (confirm('Are you sure you want delete this data?')) {
                                        event.preventDefault();
                                        document.getElementById('delete-form-{{$feedbacks->id}}').submit();
                                        }else{
                                        event.preventDefault();
                                        }
                                        " class="btn btn-outline-danger btn-rounded my-0" href="">
                                        <i class="fa fa-trash-o" aria-hidden="true"></i></button>
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
        <!-- go back to main administrator page to define/create-->
        <button type="button" onclick="window.location.href='/'"
                class="btn btn-outline-secondary btn-lg ">Voltar
        </button>
    </div>
@endsection
@section('footer')
    @parent
@endsection
