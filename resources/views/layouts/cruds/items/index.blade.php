@extends('layouts.main.app')
@section('title', 'List Items')

@section('content')
    @if (session('alert-success'))
        <div class="container alert alert-success" role="alert">
            {{session('alert-success')}}
        </div>
    @endif
    <div class="container">
        <div class=" jumbotron version_banner">
            <div class="row">
                <h4><span
                        class="badge badge-pill badge-secondary">List Items</span></h4>
            </div>
        </div>
    </div>
    <div class="container col-md-12">
        <div class="container col-md-10">
            <div class="container" style="text-align:center;">
                <a href="#" class="btn btn-success btn-lg btn-block">
                    Add Item
                </a>
                <a href="#" class="btn btn-info btn-lg btn-block">
                    Cadastrar Item
                </a>
            </div>
        </div>
        <div class=" container col-md-10">
            <div class="table-responsive-lg">
                <table class="table table-bordered table table-striped text-center">
                    <caption>List of Items</caption>
                    <thead class="black white-text">
                    <th class="text-center">Id</th>
                    <th class="text-center">name</th>
                    <th class="text-center">code</th>
                    <th class="text-center">description</th>
                    {{--                    <th class="text-center">internal_notes</th>--}}
                    {{--                    <th class="text-center">tax_fee</th>--}}
                    {{--                    <th class="text-center">feedback_score</th>--}}
                    {{--                    <th class="text-center">units</th>--}}
                    {{--                    <th class="text-center">loan_start_date</th>--}}
                    {{--                    <th class="text-center">loan_end_date</th>--}}
                    {{--                    <th class="text-center">replacement_cost</th>--}}
                    <th class="text-center">STATUS_ITEMS->id</th>
                    <th class="text-center">STATUS_ITEMS->name</th>
                    <th class="text-center">FAVORITE->id</th>
                    <th class="text-center">FAVORITE->ids</th>
                    <th class="text-center" scope="col">Ação</th>
                    </thead>
                    @forelse($items as $item)
                        <tbody>
                        <tr>
                            <td>{{$item->id_item}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->code}}</td>
                            <td>{{$item->description}}</td>
                            {{--                            <td>{{$item->internal_notes}}</td>--}}
                            {{--                            <td>{{$item->tax_fee}}</td>--}}
                            {{--                            <td>{{$item->feedback_score}}</td>--}}
                            {{--                            <td>{{$item->units}}</td>--}}
                            {{--                            <td>{{$item->loan_start_date}}</td>--}}
                            {{--                            <td>{{$item->loan_end_date}}</td>--}}
                            {{--                            <td>{{$item->replacement_cost}}</td>--}}
                            <td>{{$item->id_status}}</td>
                            <td>{{$item->status->name_status}}</td>
                            <td>{{$item->favorites}}</td>

                            <td>
                                <div class="btn-group">
                                    {{--                                    <select class="form-control m-bot15" name="role_id">--}}
                                    {{--                                        @if($item->favorites->count())--}}
                                    {{--                                            <option id="0">-- test --</option>--}}
                                    @foreach($item->favorites as $f)
                                        {{--                                                <option--}}
                                        {{--                                                    value="{{$f->id_favorite}}"--}}
                                        {{--                                                >--}}
                                        {{--                                                    {{$f->id_favorite}}</option>--}}
                                        {{$f->id_item}}
                                    @endforeach
                                    {{--                                        @endif--}}
                                    {{--                                    </select>--}}
                                </div>
                            </td>
                            <td>
                                <div class=" container-fluid">
                                    <a class="btn btn-outline-info btn-rounded my-0"
                                       href="#">
                                        <i class="fa fa-eye" aria-hidden="true"></i>View</a>
                                    <a class="btn btn-outline-warning btn-rounded  my-0"
                                       href="#">
                                        <i class="fa fa-pencil" aria-hidden="true"></i>Edit</a>
                                    <!--Delete section-->
                                    <form method="" id="delete-form-{{$item->id_item}}"
                                          action="#"
                                          style="display:none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    <button onclick="if (confirm('Are you sure you want delete this data?')) {
                                        event.preventDefault();
                                        document.getElementById('delete-form-{{$item->id_item}}').submit();
                                        }else{
                                        event.preventDefault();
                                        }
                                        " class="btn btn-outline-danger btn-rounded btn-sm my-0" href="">
                                        <i class="fa fa-trash-o" aria-hidden="true"></i>Delete
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @empty
                            <p>Nao ha items</p>
                        </tbody>
                    @endforelse
                </table>
                <!-- Pagination -->
                {{$items->links()}}
            </div>
        </div>
    </div>

@endsection
@section('footer')
    @parent
@endsection
