@extends('layouts.admin-panel')
@section('title', 'Index')

@section('content')
@if (session('suc'))
    <div class="alert alert-info" role="alert">
    <strong>{{ session('suc') }}</strong>
    </div>
@endif
    <a href="{{ route('product.create') }}" class="btn btn-primary">Tambah</a>
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-inverse">
                <thead class="thead-inverse">
                    <tr>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Foto</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($products as $item)
                        <tr>
                            <td scope="row">{{ $item->nama_produk }}</td>
                            <td>Rp. {{ number_format($item->harga, 0, ',', '.') }}</td>
                            <td><img src="{{ asset(str_replace('public','storage', $item->foto)) }}" class="resize"></td>
                            <td>
                                <a href="{{ route('product.edit', $item->id) }}" class="btn btn-primary">Edit</a>
                                <a href="{{ route('product.delete','id='.$item->id) }}" class="btn btn-warning">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                
            </table>
            {{ $products->links() }}
        </div>
    </div>
@endsection