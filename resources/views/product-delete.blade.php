@extends('layouts.admin-panel')
@section('title', 'Delete')

@section('content')
    <form action="{{ route('product.destroy', $product->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('delete')
    <img src="{{ asset(str_replace('public','storage', $product->foto)) }}" alt="" class="resize">
    <input type="hidden" name="{{ $product->id }}">
      <div class="form-group">
        <label for="produk">Nama produk</label>
        <input type="text" name="produk" id="produk" class="form-control col-md-6" placeholder="" value="{{ $product->nama_produk }}" readonly>
      </div>
      
      <div class="form-group">
        <label for="harga">Harga</label>
        <input type="number" name="harga" id="harga" class="form-control col-md-6" placeholder="" value="{{ $product->harga }}" readonly>
      </div>
      
      <div class="alert alert-danger" role="alert">
          <strong>Data tersebut akan dihapus, yakin?</strong>
      </div>
      <button type="submit" class="btn btn-danger">Hapus</button>
    </form>
@endsection
    