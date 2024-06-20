@extends('layout')
@section('content')
    <div>
        <a href="{{route('category.index')}}" class="btn btn-close float-end"></a>
    </div>
    <div class="container">
        <p>Категория <h4>{{$category->name}}</h4></p>
        <p>В секторе <h4>{{$category->sector_name}}</h4></p>
    </div>
@endsection
