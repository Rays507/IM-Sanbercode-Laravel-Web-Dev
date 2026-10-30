@extends('layouts.index')
@section('title', 'Halaman Data Transaction')
@section('content')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
<a href="/transaction/create" class="btn btn-primary">Tambah Data Transaction</a>
<table class="table">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Product</th>
        <th scope="col">Type</th>
        <th scope="col">Amount</th>
        </tr>
    </thead>
    <tbody>
        @forelse($transactions as $dataTable)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $dataTable->user->name }}</td>
            <td>{{ $dataTable->product->name }}</td>
            <td>@if(strtolower($dataTable->type) === "in")
                        <span class="badge bg-primary text-white px-2 py-1">In</span>
                    @else
                        <span class="badge bg-danger text-white px-2 py-1">Out</span>
                    @endif
            </td>
            <td>{{ $dataTable->amount }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="3" class="text-center">Belum ada data Transaksi</td>
        </tr>
        @endforelse       
    </tbody>
    </table>
@endsection