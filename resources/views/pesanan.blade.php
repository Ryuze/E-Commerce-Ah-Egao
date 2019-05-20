@extends('layouts.admin-panel')

@section('title', 'Pesanan')
    
@section('content')
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
                        <th>Pembeli</th>
                        <th>Nama barang</th>
                        <th>Total</th>
                        <th>Bukti</th>
                        <th>Alamat</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($charts as $item)
                        <tr>
                            <td scope="row">{{ $item->name }}</td>
                            <td>{{ $item->nama_produk }}</td>
                            <td>Rp. {{ number_format($item->total, 0, ',', '.') }}</td>
                            <td>
                                @if ($item->bukti == 'null')
                                    Null
                                @else
                                    <img src="{{ asset(str_replace('public','storage', $item->bukti)) }}" class="resize">
                                @endif
                            </td>
                            <td>{{ $item->alamat }}</td>
                            <td>
                                @if ($item->status == 0)
                                    <form>
                                        {{ Cookie::queue('nama', $item->name) }}
                                        {{ Cookie::queue('alamat', $item->alamat) }}
                                        <input type="button" value="Menunggu persetujuan" onclick="window.location.href='{{ route('konfirmasi.edit', $item->id) }}'" class="btn btn-warning"/>
                                    </form>
                                    {{-- <a href="{{ route('konfirmasi.edit', $item->id) }}" class="btn btn-warning">Menunggu persetujuan</a> --}}
                                @else
                                    @if ($item->status == 1)
                                        <a href="#" class="btn btn-primary">Disetujui</a>
                                    @else
                                        Null
                                    @endif
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                
            </table>
            {{ $charts->links() }}
        </div>
    </div>
@endsection