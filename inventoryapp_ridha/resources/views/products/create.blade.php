@extends('layouts.index')
@section('title', 'Form Add Data Product')
@section('content')
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
<form action="/products" method="post" enctype="multipart/form-data">
    @csrf
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="mb-3">
    <label class="form-label">Categories</label>
    <select class="form-control" name="category_id" aria-label="Default select example">
            <option value="">--pilih categories product--</option>
        @forelse ($categories as $item)
            <option value="{{$item->id}}">{{$item->name}}</option>
        @empty
            <option value="">No Data Categories</option>
        @endforelse
    </select>
    </div>
    <div class="mb-3">
      <label for="name" class="form-label">Name Product</label>
      <input type="text" name="name" class="form-control">
    </div>
    <div class="mb-3">
      <label for="formFile" class="form-label">Masukkan Gambar product</label>
      <input class="form-control" type="file" id="formFile" name="image">
    </div>
    <div class="mb-3">
      <label for="price" class="form-label">Price</label>
      <input type="number" name="price" class="form-control">
    </div>
    <div class="mb-3">
      <label for="stock" class="form-label">stock</label>
      <input type="number" name="stock" class="form-control">
    </div>
    <div class="mb-3">
      <label for="description" class="form-label">description Product</label>
      <textarea name="description" class="form-control" cols="30" rows="10"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection