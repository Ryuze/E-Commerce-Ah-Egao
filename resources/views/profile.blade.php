@extends('layouts.index')

@section('title')
@if (Auth::user()->name == $user->name)
    <title>Ah-Egao | {{ $user->name }}</title>
@else
    <title>Ah-Egao</title>
@endif
@endsection

@section('body')
@if (session('suc'))
    <div class="alert alert-info" role="alert">
    <strong>{{ session('suc') }}</strong>
    </div>
@endif
@if (Auth::user()->name == $user->name)
    <div class="container-fluid content" style="background-color: #e9e9e9; margin-top: -20px;">
        <!-- edit profil -->
        <div class="container">
            <div class="container form-item">
                <div class="table">
                    <p>Nama
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ $user->name }}" disabled></p>
                    <p>Email
                        <input type="text" class="form-control"  id="email" name="email" value="{{ $user->email }}" disabled></p>
                    <p>Alamat
                        <input type="text" class="form-control" id="password" name="password" value="{{ $user->alamat }}" disabled></p>
                        <a href="{{ route('profile.edit', $user->id) }}" class="btn btn-primary form-control">Ubah data</a>
                </div>
            </div>
        </div>
    </div>
@else
<div class="alert alert-info" role="alert">
    <strong>Anda bukan user {{ $user->name }}</strong>
</div>
@endif
@endsection