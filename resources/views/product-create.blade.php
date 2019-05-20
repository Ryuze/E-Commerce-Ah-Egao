@extends('layouts.admin-panel')
@section('title', 'Add')

@section('content')
    <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
    @csrf
      <div class="form-group">
        <label for="produk">Nama produk</label>
        <input type="text" name="produk" id="produk" class="form-control col-md-6" placeholder="">
      </div>
      
      <div class="form-group">
        <label for="harga">Harga</label>
        <input type="number" name="harga" id="harga" class="form-control col-md-6" placeholder="">
      </div>

      <label for="tag">Tag</label><br>
      <select class="browser-default custom-select col-md-6" name="tag" id="tag">
          <option value="figma">Figma</option>
          <option value="nendroid">Nendroid</option>
          <option value="pvc">PVC</option>
      </select>

      <div class="form-group">
        <input type="file" name="foto" id="">
      </div>
      
      <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
    