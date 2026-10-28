@extends('layouts.index')
@section('title', 'Edit Data Product')
@section('content')
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
<form action="/products/{{ $product->id }}" method="post" enctype="multipart/form-data">
    @csrf
    @METHOD ('PUT')
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
            <option value="{{$item->id}}" 
            @if(old('category_id', $product->category_id) == $item->id) selected @endif>{{$item->name}}</option>
        @empty
            <option value="">No Data Categories</option>
        @endforelse
    </select>
  </div>
  <div class="mb-3">
    <label for="name" class="form-label">product name</label>
    <input type="text" name="name" class="form-control" value="{{old ('name', $product->name)}}">
  </div>
  <div class="mb-3">
    <label for="formFile" class="form-label">Change image</label>
    <input class="form-control" type="file" id="formFile" name="image" src="{{asset('image/'.$product->image)}}">
    <p style="color:red">*biarkan kosong bila tidak ingin mengubah gambar</p>
  </div>
  <div class="mb-3">
    <label for="price" class="form-label">price</label>
    <input type="number" name="price" class="form-control" value="{{old ('price', $product->price)}}">
  </div>
  <div class="mb-3">
    <label for="stock" class="form-label">stock</label>
    <input type="number" name="stock" class="form-control" value="{{old ('stock', $product->stock)}}">
  </div>
  <div class="mb-3">
    <label for="description" class="form-label">description</label>
    <textarea name="description" class="form-control" cols="30" rows="10" value="{{old ('description', $product->description)}}">{{old ('description', $product->description)}}</textarea>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection