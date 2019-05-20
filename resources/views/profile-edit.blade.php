@extends('layouts.index')

@section('title')
@if (Auth::user()->name == $user->name)
    <title>Ah-Egao | {{ $user->name }}</title>
@else
    <title>Ah-Egao</title>
@endif
@endsection

@section('body')
@if (Auth::user()->name == $user->name)
    <div class="container-fluid content" style="background-color: #e9e9e9; margin-top: -20px;">
        <!-- edit profil -->
        <div class="container">
            <div class="container form-item">
                <form action="{{ route('profile.update', $user->id) }}" method="POST">
                    @csrf
                    @method('patch')
                    <div class="table">
                        <p>Nama
                            <input type="text" class="form-control" id="nama" name="nama" value="{{ $user->name }}"></p>
                        <p>Email
                            <input type="text" class="form-control"  id="email" name="email" value="{{ $user->email }}" disabled></p>
                        <p>Alamat
                            <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $user->alamat }}"></p>
                        </p>
                            <button class="btn btn-primary form-control">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@else
<div class="alert alert-info" role="alert">
    <strong>Anda bukan user {{ $user->name }}</strong>
</div>
@endif
@endsection