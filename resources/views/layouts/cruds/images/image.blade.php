@extends('layouts.main.app')



@section('content')
    <div class="row">
        <!- Div of form-->
        <div class="row container col-md-6">
            <div class="panel-body ">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
{{--                    <img src="images/{{ Session::get('image') }}">--}}
                @endif
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        There were some problems with your input.
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="container panel-body">
                    <form action="{{route('image.upload.profile')}}" id="formImg" method="POST"
                          enctype="multipart/form-data">
                        @csrf
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Ingresse um nome">
                        <input type="file" name="image" accept="image/* " class="form-control">
                        <input class="btn btn-primary" type="submit" value="Enviar">
                        
                    </form>
                    <P>IMAGEM:</p><img src="\img\avatar\{{$image->image_id ?? ''}}">

                </div>
            </div>
        </div>
        <!- Div list of images -->
        <div class="container-fluid col-md-6">
            <div class="table-responsive-md">
                <table class="table table-striped table-dark table-bordered table-hover table-sm">
                    <caption>Lista de Images</caption>
                    <thead class="thead-light">
                    <th scope="col">id</th>
                    <th scope="col">name</th>
                    <th scope="col">path_location</th>
                    <th scope="col">format_image</th>
                    <th scope="col">size_image</th>
                    <th scope="col">Ação</th>
                    </thead>
                    @forelse($images as $image)
                        <tbody>
                        <tr>
                            <td>{{$image->id_image}}</td>
                            <td>{{$image->name}}</td>
                            <td>{{$image->path_location}}</td>
                            <td>{{$image->format_image}}</td>
                            <td>{{$image->size_image}}</td>
                            <td>
                                <div class="row">

                                    <button type="button"
                                            {{--                                                    onclick="window.location.href='/detailsUser/{{$image->id_image}}}'"--}}
                                            class="btn btn-outline-primary ">Details
                                        - {{$image->id_image}}
                                    </button>
                                    <button type="button"
                                            {{--                                                    onclick="window.location.href='{{ route('users.edit',$image->id_image)}}'"--}}
                                            class="btn btn-outline-warning "> Edit
                                        - {{$image->id_image}}
                                    </button>
                                    <form class="form-inline"
                                          {{--                                                  action="{{ route('images.destroy', $image->id_image)}}"--}}
                                          method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="btn btn-outline-danger "> Delete
                                            - {{$image->id_image}}
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                            <p>Nao ha images</p>
                        </tbody>
                    @endforelse
                </table>
            </div>
        </div>
    </div>
@endsection
