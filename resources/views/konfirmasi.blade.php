@extends('layouts.admin-panel')

@section('title', 'Konfirmasi')

@section('content')
    <form action="{{ route('konfirmasi.update', $charts[0]->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')
            <div class="form-group">
                <label for="produk">Nama produk</label>
                <input type="text" name="produk" id="produk" class="form-control col-md-6" placeholder="" value="{{ $charts[0]->nama_produk }}" disabled>
            </div>

            <div class="form-group">
                <label for="harga">Total</label>
                <input type="number" name="total" id="total" class="form-control col-md-6" placeholder="" value="{{ $charts[0]->total }}" disabled>
            </div>

            <div class="form-group">
                <label for="name">Nama pembeli</label>
                <input type="text" name="name" id="name" class="form-control col-md-6" placeholder="" value="{{ $charts[0]->name }}" disabled>
            </div>

            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" name="alamat" id="alamat" class="form-control col-md-6" placeholder="" value="{{ $charts[0]->alamat }}" disabled>
            </div>

            <div class="form-group">
                <img src="{{ asset(str_replace('public','storage', $charts[0]->bukti)) }}" alt="bukti" srcset="" class="resize">
            </div>

            <input type="hidden" name="status" value="1">

            <div class="alert alert-danger" role="alert">
                <strong>Konfirmasi pembelian?</strong>
            </div>

            <button type="submit" class="btn btn-primary">Konfirmasi</button>
    </form>
@endsection