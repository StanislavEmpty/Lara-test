@extends('layout')
@section('content')
    <div>
        <a href="{{route('product.index')}}" class="btn btn-close float-end"></a>
    </div>
    <div class="container">
        <p>Продукт <h4>{{$product->name}}</h4></p>
        <p>В категории <h4>{{$product->category_name}}</h4></p>
        <ul>
            <li><span class="fs-5 bold">Price:</span> <span class="mx-2">${{$product->price}}</span></li>
            <li><span class="fs-5 bold">Make:</span><span class="mx-2">{{$product->make}}</span></li>
            <li><span class="fs-5 bold">Model:</span><span class="mx-2">{{$product->model}}</span></li>
            <li><span class="fs-5 bold">Country:</span><span class="mx-2">{{$product->country}}</span></li>
            <li><span class="fs-5 bold">Description:</span>
                <p>
                    {{$product->description}}
                </p>
            </li>
        </ul>
    </div>
@endsection
