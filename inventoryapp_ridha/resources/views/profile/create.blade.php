@extends('layouts.index')
@section('title', 'Form Create Profile')
@section('content')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
<form action="/profile" method="post">
    @csrf
    @method('POST')
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
    <label for="exampleInputEmail1" class="form-label">age</label>
    <input type="number" name="age" class="form-control">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">bio</label>
    <textarea name="bio" class="form-control" cols="30" rows="10"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection