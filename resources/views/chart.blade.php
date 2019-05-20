@extends('layouts.view')

@section('title')
    <title>Ah-Egao | Chart</title>
@endsection

@section('produk')
@if (session('suc'))
    <div class="alert alert-info" role="alert">
    <strong>{{ session('suc') }}</strong>
    </div>
@endif
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-inverse">
                <thead class="thead-inverse">
                    <tr>
                        <th>Nama</th>
                        <th>Total</th>
                        <th>Bukti</th>
                        <th></th>
                    </tr>
                </thead>
        <tbody>
    @foreach ($orders as $item)
        <tr>
            <td scope="row">{{ $item->nama_produk }}</td>
            <td>Rp. {{ number_format($item->total, 0, ',', '.') }}</td>
            <td>
                @if ($item->bukti == 'null')
                Belum ada bukti pembayaran</td>
                @else                   
                <img src="{{ asset(str_replace('public','storage', $item->bukti)) }}" class="resize"></td>  
                @endif
            <td>
                @if ($item->status == 0 && $item->bukti == 'null')
                    <a href="{{ route('chart.edit', $item->id) }}" class="btn btn-primary">Kirim bukti</a>
                @else
                    @if ($item->status == 1)
                        <div class="alert alert-info" role="alert">
                            <strong>Barang sedang dikirim</strong>
                        </div>
                    @else
                        @if ($item->bukti != 'null')
                            <div class="alert alert-warning" role="alert">
                                <strong>Menunggu persetujuan</strong>
                            </div>
                        @endif
                    @endif
                @endif
            </td>
        </tr>
    @endforeach
        </tbody>
            </table>
            {{ $orders->links() }}
        </div>
    </div>
@endsection