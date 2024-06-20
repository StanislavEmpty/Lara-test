@extends('layout')
@section('content')
    <div>
        <a href="{{route('category.index')}}" class="btn btn-close float-end"></a>
    </div>
    <div class="container">
        <h2>Изменение категории</h2>
        <form method="post" class="mt-4 form-floating mx-3" action="{{route('category.update', $category->id)}}">
            @csrf
            @method('PUT')
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Name:</label>
                <div class="col-sm-3 mb-2">
                    <input class="form-control" type="text" id="name" name="name" value="{{$category->name}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Sector:</label>
                <div class="col-sm-3 mb-2">
                    <select class="form-select form-select-sm" aria-label="form-select-sm example" name="sector_id">
                        @foreach($sectors as $sector)
                            @if($sector->id == $category->sector_id)
                                <option value="{{$sector->id}}" selected>{{$sector->name}}</option>
                            @else
                                <option value="{{$sector->id}}">{{$sector->name}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <input type="submit" class="btn btn-info m-2" value="Изменить">
        </form>
    </div>
@endsection
