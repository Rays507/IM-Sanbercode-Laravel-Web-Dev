@extends('layouts.index')
@section('title', 'Halaman Show Data detail Categories')
@section('content')
    <h1>{{$dataIDDetailCategories->name}}</h1>
    <p>{{$dataIDDetailCategories->description}}</p>
    <table class="table">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Stock</th>
        <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse($dataIDDetailCategories->products as $dataTable)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $dataTable->name }}</td>
            <td>{{ $dataTable->stock }}</td>
            <td>
                <form action="/categories/{{$dataTable->id}}" method="POST">
                @csrf
                <a href="/products/{{ $dataTable->id }}" class="btn btn-info btn-sm" >Detail</a>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="3" class="text-center">Belum ada data categories.</td>
        </tr>
        @endforelse
        
    </tbody>
    </table>
    <a href="/categories" class="btn btn-secondary btn-sm" >back</a>
@endsection