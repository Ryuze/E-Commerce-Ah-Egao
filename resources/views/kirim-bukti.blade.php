@extends('layouts.view')

@section('title')
    <title>Ah-Egao | Bukti</title>
@endsection

@section('produk')
@if (session('suc'))
    <div class="alert alert-info" role="alert">
    <strong>{{ session('suc') }}</strong>
    </div>
@endif
    <form action="{{ route('chart.update', $charts->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('patch')
    <div class="form-group">
        <input type="file" name="bukti" id="bukti" required>
        <input type="hidden" name="bukti_old" value="{{ $charts->bukti }}">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection