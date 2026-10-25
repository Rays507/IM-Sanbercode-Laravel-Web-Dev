@extends('layouts.index')
@section('title', 'Halaman Form Categories')
@section('content')
<form action="/categories" method="post">
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
    <label for="exampleInputEmail1" class="form-label">Name Categories</label>
    <input type="text" name="name" class="form-control">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">description Categories</label>
    <textarea name="description" class="form-control" cols="30" rows="10"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection