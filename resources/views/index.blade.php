@extends('layouts.index')

@section('title')
    <title>Ah-Egao</title>
@endsection

@section('body')
        @if (session('suc'))
			<div class="alert alert-info" role="alert">
			<strong>{{ session('suc') }}</strong>
			</div>
		@endif
    <div class="container-fluid content">
        <!-- jumbotron -->
        <div class="page-header">
            <div class="jumbotron">
                <h2>#AndaPuas#KamiLemas</h2>
                <table class="garis garis-menu" style="margin:auto;"><tr><td></td></tr></table>
            </div>
        </div>
        <!-- Penutup jumbotron -->
        <!-- pamflet -->
        <div class="container" >
            <div class="pamflet">
                <div id="carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carousel" data-slide-to="0"></li>
                        <li data-target="#carousel" data-slide-to="1"></li>
                        <li data-target="#carousel" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-inner">
                            <div class="item active">
                                <a href="#" target="_blank"><img src="{{ asset('storage/pamflet/1.png') }}" alt="Slide 1" class="gambar-pamflet"></a>
                            </div>
                            <div class="item">
                                <img src="{{ asset('storage/pamflet/2.png') }}" alt="Slide 2" class="gambar-pamflet">
                            </div>
                            <div class="item">
                                <img src="{{ asset('storage/pamflet/3.png') }}" alt="Slide 3" class="gambar-pamflet">
                            </div>
                        </div>
                    </div>
                    <a href="#carousel" class="left carousel-control" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a href="#carousel" class="right carousel-control" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                </div>
            </div>
        </div>
        <div class="container-fluid page-header"></div>
        <!-- penutup pamflet -->
        <!-- product baru -->
        <div class="container">
            <div class="product" id="product">
            @foreach ($products as $item)
                <div class="view-product-order product-item">
                    <a href="{{ url('item/'. $item->id) }}" class="thumnail">
                        <img src="{{ asset(str_replace('public','storage', $item->foto)) }}" class="resize batas-img">
                        <div class="caption">
                            <h4>{{ $item->nama_produk }}</h4>
                            <p>Rp. {{ number_format($item->harga, 0, ',', '.') }}</p>
                        </div>
                    </a>
                </div>
            @endforeach
            </div>
        </div>
        <!-- penutup product -->
    </div>
@endsection