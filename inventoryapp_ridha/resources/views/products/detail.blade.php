@extends('layouts.index')
@section('title', 'Data Detail Products')
@section('content')
    <div>
            <img src="{{asset('image/'.$product->image)}}" alt="{{$product->image}}">
            <h3 style="color:blue;">{{$product->name}}</h3>
            <h4 style="color:blue;">harga : RP {{$product->price}}</h4>
            <h5 style="color:blue;">stock : {{$product->stock}}</h5>
            <p class="text text-muted small">{{$product->description}}</p>
            <a href="/products" class="btn btn-secondary btn-sm" >back</a>  
    </div>
@endsection