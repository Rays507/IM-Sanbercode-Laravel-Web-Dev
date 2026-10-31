@extends('layouts.index')
@section('title', 'Show Data Products')
@section('content')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@if(Auth::check() && auth::user()->role === 'admin')
<a href="/products/create" class="btn btn-primary mb-3">Tambah Data Product</a>
@endif
<div class="row">
    @foreach ($products as $item)
    <div class="col-md-4 mb-4">
        <div class="card h-100 shadow-sm border-1">
            <div style="height: 250px; overflow: hidden;" class="text-center">
                <img src="{{asset('image/'.$item->image)}}" class="w-100 h-100" alt="{{$item->image}}" style="object-fit:cover;">
            </div>
            <div class="card-body d-flex flex-column">
                <div class="mb-2">
                    <span class="badge bg-primary text-white px-3 py-2 fw-normal" style="font-size: 0.85rem;">
                        @if($item->categories)
                            {{ $item->categories->name }}
                        @else
                            tidak ada category
                        @endif
                    </span>
                </div>
                
                <h5 class="card-title fw-bold text-dark">{{$item->name, 50}}</h5>

                <p class="text-primary fw-semibold mb-1">RP {{$item->price}}</p>

                <p class="text-muted small mb-2">Stock : {{$item->stock}}</p>

                <p class="card-text text-muted small flex-grow-1">{{Str::limit($item->description, 50)}}</p>
                
                <form action="/products/{{$item->id}}" method="POST">
                    @csrf
                    <a href="/products/{{$item->id}}" class="btn btn-primary w-100 text-white mb-3">Read More</a>
                        @if(Auth::check() && auth::user()->role === 'admin')
                        <div class="d-flex gap-2">
                            <a href="/products/{{$item->id}}/edit" class="btn btn-warning w-50 text-white">edit</a>
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger w-50 text-white">delete</button>
                        </div>
                        @endif
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection