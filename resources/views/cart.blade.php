@extends('layout')
@section('content')
    <div class="d-flex">
        <span class="fs-4">Total:</span><span class="fs-4">${{$total}}</span>
    </div>
    <div class="d-flex flex-wrap mb-3 p-2 gap-5">
        @foreach($products as $product)
            <div class="card" style="width: 20rem;">
                <div class="card-body d-flex justify-content-between">
                    <h5 class="card-title">{{$product->name}}</h5>
                    <form method="post" action="{{route('removeProductFromCart')}}">
                        @csrf
                        <input type="hidden" name="cart_id" value="{{$product->cart_id}}">
                        <input type="submit" class="btn btn-close float-end" value="">
                    </form>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Model: {{$product->model}}</li>
                    <li class="list-group-item">Price: ${{$product->price}}</li>
                </ul>
                <div class="card-body">
                    <form action="">
                        <input type="hidden" name="cart_id" value="{{$product->cart_id}}">
                        <div class="form-group row">
                            <label for="quantity" class="col-sm-4 col-form-label">Quantity:</label>
                            <div class="col-sm-5 mb-2">
                                <input class="form-control" type="number" id="quantity" name="quantity" min="1" value="{{$product->quantity}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="form-check mb-2 mx-3">
                                <input class="form-check-input" type="checkbox" name="isIncludeToPay" value="" id="isIncludeToPay{{$product->id}}">
                                <label class="form-check-label" for="isIncludeToPay{{$product->id}}">
                                    Include to pay
                                </label>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection
