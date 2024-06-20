@extends('layout')
@section('content')
    <h2>Секторы</h2>

    <p>
        <a class="btn btn-success" role="button" href="{{route('sector.create')}}">Добавить</a>
    </p>
    @if(count($sectors))
        <table class="table">
            <thead>
            <tr>
                <th scope="col" class="w-25">Id</th>
                <th scope="col" class="w-75">Name</th>
            </tr>
            </thead>
            <tbody>
            @foreach($sectors as $sector)
                <tr>
                    <th scope="row">{{$sector->id}}</th>
                    <td>{{$sector->name}}</td>
                    <td>
                        <div class="d-flex gap-2">
                            <a href="{{route('sector.show',$sector->id)}}" class="btn btn-info" role="button">Показать</a>
                            <a href="{{route('sector.edit',$sector->id)}}" class="btn btn-primary" role="button">Изменить</a>
                            <form action="{{route('sector.destroy',$sector->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Удалить" class="btn btn-danger">
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@endsection
