@extends('layout')
@section('content')
    <h2>Продукты</h2>

    <p>
        <a class="btn btn-success" role="button" href="{{route('product.create')}}">Добавить</a>
    </p>
    @if(count($products))
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col" class="w-25">Name</th>
                <th scope="col">Price</th>
                <th scope="col" class="w-25">Category</th>
                <th scope="col">Make</th>
                <th scope="col">Model</th>
                <th scope="col" class="w-25">Country</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <th scope="row">{{$product->id}}</th>
                    <td>{{$product->name}}</td>
                    <td>${{$product->price}}</td>
                    <td>{{$product->category_name}}</td>
                    <td>{{$product->make}}</td>
                    <td>{{$product->model}}</td>
                    <td>{{$product->country}}</td>
                    <td>
                        <div class="d-flex gap-2">
                            <a href="{{route('product.show',$product->id)}}" class="btn btn-info" role="button">Показать</a>
                            <a href="{{route('product.edit',$product->id)}}" class="btn btn-primary" role="button">Изменить</a>
                            <form action="{{route('product.destroy',$product->id)}}" method="post">
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
