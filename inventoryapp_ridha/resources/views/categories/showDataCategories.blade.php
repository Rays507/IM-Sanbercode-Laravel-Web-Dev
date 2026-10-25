@extends('layouts.index')
@section('title', 'Halaman Show Data Categories')
@section('content')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
<a href="/categories/create" class="btn btn-primary">Tambah Data</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @forelse($categories as $dataTable)
    <tr>
        <th scope="row">{{ $loop->iteration }}</th>
        <td>{{ $dataTable->name }}</td>
        <td>
            <form action="/categories/{{$dataTable->id}}" method="POST">
            @method("DELETE")    
            @csrf
            <a href="/categories/{{$dataTable->id}}" class="btn btn-info btn-sm" >Detail</a>
            <a href="/categories/{{$dataTable->id}}/editDataCategories" class="btn btn-warning btn-sm" >update</a>
            <input type="submit" value=" Delete" class="btn btn-danger btn-sm">
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
@endsection