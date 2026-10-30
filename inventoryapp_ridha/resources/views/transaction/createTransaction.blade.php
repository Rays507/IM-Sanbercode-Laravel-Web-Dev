@extends('layouts.index')
@section('title', 'Form Add Transaction')
@section('content')
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form action="/transaction" method="post">
    @csrf
    @method("POST")
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
    <label class="form-label">Name Product :</label>
    <select class="form-select" name="product_id" aria-label="Default select example">
            <option value="">--pilih product--</option>
        @forelse ($product as $item)
            <option value="{{$item->id}}">{{$item->name}}</option>
        @empty
            <option value="">No Data Produk</option>
        @endforelse
    </select>
    <label class="form-label" name="type">type :</label>
    <select class="form-select" name="type" aria-label="Default select example">
            <option value="In">In</option>
            <option value="Out">Out</option>
    </select>
    </div>
    <div class="mb-3">
      <label for="amount" class="form-label">Amount :</label>
      <input type="number" name="amount" class="form-control">
    </div>
    <div class="mb-3">
      <label for="notes" class="form-label">Notes :</label>
      <textarea name="notes" class="form-control" cols="30" rows="10"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection