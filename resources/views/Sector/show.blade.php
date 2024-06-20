@extends('layout')
@section('content')
    <div>
        <a href="{{route('sector.index')}}" class="btn btn-close float-end"></a>
    </div>
    <div class="container">
        <p>Сектор <h4>{{$sector->name}}</h4></p>
    </div>
@endsection
