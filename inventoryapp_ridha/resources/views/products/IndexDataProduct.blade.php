@extends('layouts.index')
@section('title', 'Show Data Products')
@section('content')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<a href="/products/create" class="btn btn-primary mb-3">Tambah Data Product</a>
<div class="row">
    @foreach ($products as $item)
    <div class="col-md-4 mb-4">
        <div class="card h-100 shadow-sm border-1">
            <div style="height: 250px; overflow: hidden;" class="text-center">
                <img src="{{asset('image/'.$item->image)}}" class="w-100 h-100" alt="{{$item->image}}" stye="object-fit:cover;">
            </div>
            <div class="d-flex">
                <a href="#" class="btn btn-primary w-30 text-white mt-2">{{$item->category_id}}</a>
            </div>
            <div class="card-body d-flex flex-column">
                <h5 class="card-title fw-bold text-dark">{{$item->name, 50}}</h5>

                <p class="text-primary fw-semibold mb-1">RP {{$item->price}}</p>

                <p class="text-muted small mb-2">Stock : {{$item->stock}}</p>

                <p class="card-text text-muted small flex-grow-1">{{Str::limit($item->description, 50)}}</p>
                
                <form action="/products/{{$item->id}}" method="POST">
                    @csrf
                    <a href="/products/{{$item->id}}" class="btn btn-primary w-100 text-white mb-3">Read More</a>
                        <div class="d-flex gap-2">
                            <a href="/products/{{$item->id}}/edit" class="btn btn-warning w-50 text-white">edit</a>
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger w-50 text-white">delete</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection