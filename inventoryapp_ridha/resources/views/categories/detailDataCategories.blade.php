@extends('layouts.index')
@section('title', 'Halaman Show Data detail Categories')
@section('content')
    <h1>{{$dataIDDetailCategories->name}}</h1>
    <p>{{$dataIDDetailCategories->description}}</p>
    <a href="/categories" class="btn btn-secondary btn-sm" >back</a>
@endsection