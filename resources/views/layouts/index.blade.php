<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		@yield('title')
		<meta charset=utf-8>
		<meta name=description content="">
		<meta name=viewport content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="{{ asset('css\index\styles\bootstrap.min.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('css\index\plugin\slick\slick.css') }}"/>
		<link rel="stylesheet" type="text/css" href="{{ asset('css\index\plugin\slick\slick-theme.css') }}"/>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
		<link rel="stylesheet" href="{{ asset('css\index\styles\styles.css') }}">
	</head>
	<body>
		<div id="home">
			<div class="container-fluid">
				<div class="page-header">
					<h1>Ah-Egao
					<small>yang original hanya di ah-egao</small>
					
					<form class="navbar-form navbar-right" role="search">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Search">
						</div>
						<button type="submit" class="btn btn-default form-control" style="margin-top: 5px;"><span class="glyphicon glyphicon-search" ></span></button>
					</form>
					
					</h1>
				</div>
			</div>
			<!-- navigasi halaman -->
			<nav class="navbar navbar-default panel-color" id="navbar">
				<div class="navbar-header">
					<ul class="nav navbar-nav">
						<li class="menu-3"><a href="/">Home</a></li>
						<li class="menu-1"><a href="#">Produk kita
							<span class="caret"></span></a>
							<div>
								<ul class="nav navbar-menu">
									<table class="garis garis-menu"><tr><td></td></tr></table>
									<li><a href="#">Figma</a></li>
									<li><a href="#">Nendroid</a></li>
									<li><a href="#">PVC</a></li>
								</ul>
							</div>
						</li>
						<!-- bantuan -->
						<li class="menu-2" ><a href="#">Bantuan <span class="caret"></span></a>
						<div>
							<ul class="nav navbar-menu" >
								<table class="garis garis-menu"><tr><td></td></tr></table>
								<li><a href="#">cara beli</a></li>
								<li><a href="#">hubungi kami</a></li>
							</ul>
						</div>
					</li>
				<!-- penutup bantuan -->
			</ul>
		</div>
		<ul class="nav navbar-nav navbar-right">
            @csrf
			<li class="menu-3">
				@if (Auth::check())
					<a href="{{ url('chart/'. Auth::user()->id) }}">
				@else
					<a href="{{ route('login') }}"
				@endif
			<i class="fas fa-shopping-cart"></i></a></li>
            <li class="menu-3">
                @if (Auth::check())
					<li class="menu-1"><a href="#">
						{{ Auth::user()->name }} <i class="fas fa-user-tie">
						</i></a>
						<div>
							<ul class="nav navbar-menu">
								<table class="garis garis-menu"><tr><td></td></tr></table>
								<li>
									<a href="{{'../'. 'profile/'. Auth::user()->id }}">Profile</a>
								</li>
								<li>
									<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
										{{ __('Logout') }}
									</a>
						
									<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									@csrf
									</form>
								</li>
							</ul>
						</div>
					</li>                    
                @else    
                    @if (Route::has('login'))
                        <a href="{{ route('login') }}">Login</a>
                        <li class="menu-3">
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        </li>
                        @endif
                    @endif
                @endif
            </li>               
		</ul>
	</nav>
	
	<!-- penutup navigasi -->
	<!-- body halaman -->
	@yield('body')
	<!-- penutup product baru -->

	{{-- hapus cookie --}}
	{{ Cookie::queue('id', '', -1) }}
	{{ Cookie::queue('produk', '', -1) }}
	{{ Cookie::queue('harga', '', -1) }}
	{{ Cookie::queue('foto', '', -1) }}

	<!-- footer -->
	<div class="panel panel-default" style="width: 100%">
		<div class="panel-footer">© 2019. A-toys.Ah-Egao - #AndaPuas#KamiLemas</div>
	</div>
	<!-- penutup footer -->
</div>
<!-- penutup halaman -->
</div>
<script src="{{ asset('js\index\js\jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('js\index\js\bootstrap.min.js') }}"></script>
<script src="{{ asset('js\index\js\javascript.js') }}"></script>
<script type="text/javascript" src="{{ asset('css\index\plugin\slick\slick.min.js') }}"></script>
</body>
</html>