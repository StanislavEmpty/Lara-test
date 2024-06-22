@extends('layout')
@section('content')
    <div class="row">
        <div class="col-4">
            <form action="">
                <div class="form-group row">
                    <label for="minPrice" class="col-sm-3 col-form-label">Min Price:</label>
                    <div class="col-sm-4 mb-2">
                        <input class="form-control" type="number" id="minPrice" name="minPrice" min="1" value="{{$minPrice}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="maxPrice" class="col-sm-3 col-form-label">Max Price:</label>
                    <div class="col-sm-4 mb-2">
                        <input class="form-control" type="text" id="maxPrice" name="maxPrice"  min="100" value="{{$maxPrice}}">
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <h3 class="col-sm-3 col-form-label">Make:</h3>
                    @foreach($makes as $obj)
                        <div class="form-check mx-3">
                            <input class="form-check-input" type="checkbox" value="" id="{{$obj->make}}">
                            <label class="form-check-label" for="{{$obj->make}}">
                                {{$obj->make}}
                            </label>
                        </div>
                    @endforeach
                </div>
                <hr>
                <div class="form-group row">
                    <h3 class="col-sm-3 col-form-label">Country:</h3>
                    @foreach($countries as $obj)
                        <div class="form-check mx-3">
                            <input class="form-check-input" type="checkbox" value="" id="{{$obj->country}}">
                            <label class="form-check-label" for="{{$obj->country}}">
                                {{$obj->country}}
                            </label>
                        </div>
                    @endforeach
                </div>
                <hr>
                <button type="submit" class="btn btn-primary w-100">Accept filters</button>
            </form>
        </div>
        <div class="col-lg-8">
            <div class="d-flex flex-row mb-3 gap-4 text-center">
                <h5>Sort by name:
                    @if($orderName == 'ASC')
                        <span class="mx-2">Asc</span>
                        <span>/</span>
                        <a href="{{route('home', ['orderName'=> "DESC", 'orderPrice' => $orderPrice])}}" class="mx-2">Desc</a>
                    @else
                        <a href="{{route('home', ['orderName'=> "ASC", 'orderPrice' => $orderPrice])}}" class="mx-2">Asc</a>
                        <span>/</span>
                        <span class="mx-2">Desc</span>
                    @endif
                </h5>
                <h5>Sort by price:
                    @if($orderPrice== 'ASC')
                        <span class="mx-2">Asc</span>
                        <span>/</span>
                        <a href="{{route('home', ['orderName'=> $orderName, 'orderPrice' => "DESC"])}}" class="mx-2">Desc</a>
                    @else
                        <a href="{{route('home', ['orderName'=> $orderName, 'orderPrice' => "ASC"])}}" class="mx-2">Asc</a>
                        <span>/</span>
                        <span class="mx-2">Desc</span>
                    @endif
                </h5>
                <a role="button" href="{{route('cart')}}" class="btn btn-primary position-relative">
                    Cart
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        {{$countOfCart}}
                        <span class="visually-hidden">unread messages</span>
                    </span>
                </a>
            </div>
            <div class="d-flex flex-wrap mb-3 p-2 gap-4">
                @foreach($products as $product)
                    <div class="card" style="width: 16rem;">
                        <div class="card-body">
                            <h5 class="card-title">{{$product->name}}</h5>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Model: {{$product->model}}</li>
                            <li class="list-group-item">Price: ${{$product->price}}</li>
                        </ul>
                        <div class="card-body">
                            <form method="post" action="{{route('buyProduct')}}">
                                @csrf
                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                <input type="submit" class="btn btn-outline-info w-100" value="Buy">
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
