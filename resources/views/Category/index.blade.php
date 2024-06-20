@extends('layout')
@section('content')
    <h2>Категории</h2>

    <p>
        <a class="btn btn-success" role="button" href="{{route('category.create')}}">Добавить</a>
    </p>
    @if(count($categories))
        <table class="table">
            <thead>
            <tr>
                <th scope="col" class="w-25">Id</th>
                <th scope="col" class="w-50">Name</th>
                <th scope="col" class="w-50">Sector</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <th scope="row">{{$category->id}}</th>
                    <td>{{$category->name}}</td>
                    <td>{{$category->sector_name}}</td>
                    <td>
                        <div class="d-flex gap-2">
                            <a href="{{route('category.show',$category->id)}}" class="btn btn-info" role="button">Показать</a>
                            <a href="{{route('category.edit',$category->id)}}" class="btn btn-primary" role="button">Изменить</a>
                            <form action="{{route('category.destroy',$category->id)}}" method="post">
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
