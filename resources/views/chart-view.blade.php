@extends('layouts.view')

@section('title')
    <title>Ah-Egao | Chart</title>
@endsection

@section('produk')
    <div class="row">
            <div class="col-lg-4">
                <div class="item" id="item">
                    <img src="{{ asset(str_replace('public','storage', Cookie::get('foto'))) }}" alt="">
                </div>
            </div>
            <div class="col-lg-7">
                <!-- judul	 -->
                <div class="page-header margin-h1">
                    <div class="layout-item-nama">
                        <h1>{{ Cookie::get('produk') }}</h1>
                    </div>
                </div>

                <!-- harga -->
                <div class="layout-item-harga margin-h1">
                        <h2>Rp. {{ number_format(Cookie::get('harga'), 0, ',', '.') }}</h2>
                </div>
                <form action="{{ route('chart.store') }}" method="post">
                    @csrf
                    <div class="layout-item-jumlah margin-h1">
                        <label for="jumlah">Jumlah item</label>
                        <div class="layout-item-nominal-jumlah">
                            <input type="number" id="jumlah" name="jumlah" value ="1" min="1">
                        </div>
                            <input type="hidden" name="id" value="{{ Cookie::get('id') }}">
                            <input type="hidden" name="produk" value="{{ Cookie::get('produk') }}">
                            <input type="hidden" name="harga" value="{{ Cookie::get('harga') }}">
                            <input type="hidden" name="status" value="0">

                        <button class="btn btn-success form-control" type="submit">Beli</button>
                </form>
                    <small>Jaminan 100% Aman Uang pasti kembali. Sistem pembayaran bebas penipuan. Selengkapnya.Barang tidak sesuai pesanan? Ikuti langkah retur barang di sini.</small>
                </div>
                <!-- penutup judul -->
            </div>
    </div>
@endsection