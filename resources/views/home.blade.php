@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <!-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif -->
                    Berhasil log in.

                    @if(auth()->user()->is_admin == 1)
                    <p>
                    <a href="{{url('admin')}}">Klik dinisi</a>, jika browser tidak melakukan auto redirect.
                    </p>
                    <?php
                        header("Refresh: 2; url=/admin");
                    ?>
                    @else
                    <p>
                    <a href="{{url('/')}}">Klik dinisi</a>, jika browser tidak melakukan auto redirect.
                    </p>
                    <?php
                        header("Refresh: 2; url=/");
                    ?>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
