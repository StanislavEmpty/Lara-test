@extends('layout')
@section('content')
    <div>
        <a href="{{route('category.index')}}" class="btn btn-close float-end"></a>
    </div>
    <div class="container">
        <h2>Создание категории</h2>
        <form method="post" class="mt-4 form-floating mx-3" action="{{route('category.store')}}">
            @csrf
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Name:</label>
                <div class="col-sm-3 mb-2">
                    <input class="form-control" type="text" id="name" name="name">
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Sector:</label>
                <div class="col-sm-3 mb-2">
                    <select class="form-select form-select-sm" aria-label="form-select-sm example" name="sector_id">
                       @foreach($sectors as $sector)
                            <option value="{{$sector->id}}">{{$sector->name}}</option>
                       @endforeach
                    </select>
                </div>
            </div>
            <input type="submit" class="btn btn-success m-2" value="Создать">
        </form>
    </div>
@endsection
