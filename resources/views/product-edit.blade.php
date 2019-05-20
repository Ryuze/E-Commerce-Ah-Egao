@extends('layouts.admin-panel')
@section('title', 'Edit')

@section('content')
    <form action="{{ route('product.update', $product->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('patch')
      <div class="form-group">
        <label for="produk">Nama produk</label>
        <input type="text" name="produk" id="produk" class="form-control col-md-6" placeholder="" value="{{ $product->nama_produk }}">
      </div>
      
      <div class="form-group">
        <label for="harga">Harga</label>
        <input type="number" name="harga" id="harga" class="form-control col-md-6" placeholder="" value="{{ $product->harga }}">
      </div>

      <label for="tag">Tag</label><br>
      <select class="browser-default custom-select col-md-6" name="tag" id="tag">
          <option selected value="{{ $product->tag }}">Pilih Tag jika ingin mengubah Tag</option>
          <option value="figma">Figma</option>
          <option value="nendroid">Nendroid</option>
          <option value="pvc">PVC</option>
      </select>
      
      <div class="form-group">
        <input type="file" name="foto" id="">
        <input type="hidden" name="foto_old" value="{{ $product->foto }}">
      </div>
      
      <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
    