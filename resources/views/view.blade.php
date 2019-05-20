@extends('layouts.view')

@section('title')
    <title>
        {{ $product->nama_produk }} | Ah-Egao
    </title>
@endsection

@section('produk')
    <div class="row">
            <div class="col-lg-4">
                <div class="item" id="item">
                    <img src="{{ asset(str_replace('public','storage', $product->foto)) }}" alt="">
                </div>
            </div>
            <div class="col-lg-7">
                <!-- judul	 -->
                <div class="page-header margin-h1">
                    <div class="layout-item-nama">
                        <h1>{{ $product->nama_produk }}</h1>
                    </div>
                </div>

                <!-- harga -->
                <div class="layout-item-harga margin-h1">
                        <h2>Rp. {{ number_format($product->harga, 0, ',', '.') }}</h2>
                </div>

                <div class="layout-item-jumlah margin-h1">
                        {{ Cookie::queue('id', Auth::id()) }}
                        {{ Cookie::queue('produk', $product->nama_produk) }}
                        {{ Cookie::queue('harga', $product->harga) }}
                        {{ Cookie::queue('foto', $product->foto) }}
                    <a href="{{ route('chart.create') }}" class="btn btn-success form-control">Beli</a>
                    <small>Jaminan 100% Aman Uang pasti kembali. Sistem pembayaran bebas penipuan. Selengkapnya.Barang tidak sesuai pesanan? Ikuti langkah retur barang di sini.</small>
                </div>
                <!-- penutup judul -->
            </div>
    </div>
@endsection