@extends('layout')
@section('content')
    <div>
        <a href="{{route('sector.index')}}" class="btn btn-close float-end"></a>
    </div>
    <div class="container">
        <h2>Создание сектора</h2>
        <form method="post" class="mt-4 form-floating mx-3" action="{{route('sector.store')}}">
            @csrf
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Name:</label>
                <div class="col-sm-3 mb-2">
                    <input class="form-control" type="text" id="name" name="name">
                </div>
            </div>
            <input type="submit" class="btn btn-success m-2" value="Создать">
        </form>
    </div>
@endsection
