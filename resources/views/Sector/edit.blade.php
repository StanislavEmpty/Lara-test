@extends('layout')
@section('content')
    <div>
        <a href="{{route('sector.index')}}" class="btn btn-close float-end"></a>
    </div>
    <div class="container">
        <h2>Изменение сектора</h2>
        <form method="post" class="mt-4 form-floating mx-3" action="{{route('sector.update', $sector->id)}}">
            @csrf
            @method('PUT')
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Name:</label>
                <div class="col-sm-3 mb-2">
                    <input class="form-control" type="text" id="name" name="name" value="{{$sector->name}}">
                </div>
            </div>
            <input type="submit" class="btn btn-info m-2" value="Изменить">
        </form>
    </div>
@endsection
