@extends('layouts.index')
@section('title', 'Form update Profile')
@section('content')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
<form action="/profile/{{ $profile->id }}" method="POST">
    @csrf
    @method('PUT')
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
    <input type="number" name="age" class="form-control" value="{{old('age', $profile->age)}}">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">alamat</label>
    <textarea name="bio" class="form-control" cols="30" rows="10">{{old('bio', $profile->bio)}}</textarea>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection