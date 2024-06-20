@extends('layout')
@section('content')
    <div>
        <a href="{{route('product.index')}}" class="btn btn-close float-end"></a>
    </div>
    <div class="container">
        <h2>Создание продукта</h2>
        <form method="post" class="mt-4 form-floating mx-3" action="{{route('product.store')}}">
            @csrf
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Name:</label>
                <div class="col-sm-3 mb-2">
                    <input class="form-control" type="text" id="name" name="name">
                </div>
            </div>
            <div class="form-group row">
                <label for="price" class="col-sm-2 col-form-label">Price:</label>
                <div class="col-sm-3 mb-2">
                    <div class="input-group">
                        <span class="input-group-text">$</span>
                        <span class="input-group-text">0.00</span>
                        <input type="text" class="form-control" aria-label="Dollar price (with dot and two decimal places)" name="price">
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Category:</label>
                <div class="col-sm-3 mb-2">
                    <select class="form-select form-select-sm" aria-label="form-select-sm example" name="category_id">
                       @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                       @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="make" class="col-sm-2 col-form-label">Make:</label>
                <div class="col-sm-3 mb-2">
                    <input class="form-control" type="text" id="make" name="make">
                </div>
            </div>
            <div class="form-group row">
                <label for="model" class="col-sm-2 col-form-label">Model:</label>
                <div class="col-sm-3 mb-2">
                    <input class="form-control" type="text" id="model" name="model">
                </div>
            </div>
            <div class="form-group row">
                <label for="country" class="col-sm-2 col-form-label">Country:</label>
                <div class="col-sm-3 mb-2">
                    <input class="form-control" type="text" id="country" name="country">
                </div>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description:</label>
                <textarea class="form-control" id="description" rows="3" name="description"></textarea>
            </div>
            <input type="submit" class="btn btn-success m-2" value="Создать">
        </form>
    </div>
@endsection
