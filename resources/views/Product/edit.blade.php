@extends('layout')
@section('content')
    <div>
        <a href="{{route('product.index')}}" class="btn btn-close float-end"></a>
    </div>
    <div class="container">
        <h2>Изменение продукта</h2>
        <form method="post" class="mt-4 form-floating mx-3" action="{{route('product.update', $product->id)}}">
            @csrf
            @method('PUT')
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Name:</label>
                <div class="col-sm-3 mb-2">
                    <input class="form-control" type="text" id="name" name="name" value="{{$product->name}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="price" class="col-sm-2 col-form-label">Price:</label>
                <div class="col-sm-3 mb-2">
                    <div class="input-group">
                        <span class="input-group-text">$</span>
                        <span class="input-group-text">0.00</span>
                        <input type="text" class="form-control" aria-label="Dollar price (with dot and two decimal places)" name="price" value="{{$product->price}}">
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Category:</label>
                <div class="col-sm-3 mb-2">
                    <select class="form-select form-select-sm" aria-label="form-select-sm example" name="category_id">
                        @foreach($categories as $category)
                            @if($category->id == $product->category_id)
                                <option value="{{$category->id}}" selected>{{$category->name}}</option>
                            @else
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="make" class="col-sm-2 col-form-label">Make:</label>
                <div class="col-sm-3 mb-2">
                    <input class="form-control" type="text" id="make" name="make" value="{{$product->make}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="model" class="col-sm-2 col-form-label">Model:</label>
                <div class="col-sm-3 mb-2">
                    <input class="form-control" type="text" id="model" name="model" value="{{$product->model}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="country" class="col-sm-2 col-form-label">Country:</label>
                <div class="col-sm-3 mb-2">
                    <input class="form-control" type="text" id="country" name="country" value="{{$product->country}}">
                </div>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description:</label>
                <textarea class="form-control" id="description" rows="3" name="description">{{$product->description}}</textarea>
            </div>
            <input type="submit" class="btn btn-info m-2" value="Изменить">
        </form>
    </div>
@endsection
