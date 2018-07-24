<!DOCTYPE html>
<html lang="en">
<head>
	{{-- <a href="https://web.facebook.com/reza.pointblank02"> --}}
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	
	
	<link rel="stylesheet" type="text/css" href="{{asset('component/bootstrap/dist/css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('component/bootstrap/dist/css/style.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('component/bootstrap/dist/css/responsive.css')}}">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	
	<script src="{{asset('js/jquery.min.js')}}"></script>
	<title>Website Desa</title>

</script>
	<style type="text/css">
	.konten{
		overflow-wrap: break-word;
	}

	#dash {
		width: 500px;
		height: 100px;
		overflow: hidden;
	}

	#dash p {
		padding: 10px;
		margin: 0;
	}

	.asd{
		background-image: url({{URL::asset('img/background.jpg')}});
		/* Full height */
    
    /* Center and scale the image nicely */
    background-position: center;
    background-size: cover;
	}
}

</style>
</head>
<body>
<div class="asd">
	<div class="container" style="">
		<img src="{{asset('img/header.jpg')}}" style="width: 100%; height: 400px;">	
		<!-- navbar -->
		<nav class="navbar navbar-default" id="sini">

			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="{{url('/')}}">Website Desa</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="{{url('/')}}">Beranda <span class="sr-only">(current)</span></a></li>
					<?php $x=1;?>
					@foreach($data2 as $dataa2)
					<?php $x++;?>
							@if($x<=5)
								<li><a href="{{url('/artikel/'.$dataa2->nama)}}">{{$dataa2->nama}}</a></li>
							@endif
					@endforeach
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Lainnya <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<?php $x=1;?>
							@foreach($data2 as $dataa2)
							<?php $x++;?>
								@if($x>=6)
								<li><a href="{{url('/artikel/'.$dataa2->nama)}}">{{$dataa2->nama}}</a></li>
								@endif
							@endforeach
							<li class="divider"></li>
							<li><a href="{{url('/galeri')}}">Galeri</a>
							</li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Tentang Desa <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="#">Profil Desa</a></li>
							<li><a href="#">Pemerintahan Desa</a></li>
							<li><a href="#">Lembaga Masyarakat</a></li>
							<li><a href="#">Data Desa</a></li>
							<li><a href="#">Kontak</a></li>
						</ul>
					</li>
				</ul>
				{{-- <form class="navbar-form navbar-left" role="search">
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Search">
					</div>
					<button type="submit" class="btn btn-default">Submit</button>
				</form> --}}
				<ul class="nav navbar-nav navbar-right">
					@if(Auth::check())
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
							<b>{{ Auth::user()->name }} <span class="caret"></span></b>
						</a>

						<ul class="dropdown-menu">
							<li>
								@if(Auth::user()->roles->first()->nama == 'Admin')
								<a href="{{url('admin')}}">Beranda Ku</a>
								@elseif(Auth::user()->roles->first()->nama == 'Penulis')
								<a href="{{url('penulis')}}">Beranda Ku</a>
								@else
								@endif

							</li>
							<li class="divider"></li>
							<li>
								<a href="{{ route('logout') }}"
								onclick="event.preventDefault();
								document.getElementById('logout-form').submit();">
								Keluar
							</a>
							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
								{{ csrf_field() }}
							</form>
						</li>
					</ul>
				</li>
				@else
				<li><a href="{{url('login')}}"><b>Masuk</b></a></li>
				@endif

			</ul>
		</div>
	</nav>
</div>
<!-- navbar -->



<!-- isi -->
<div class="container">	
	<div class="row">
		<!-- layout kiri -->
		<div class="col-md-12 col-lg-8">
			<div class="row" >
				<div class="col-md-12">	
					<div class="panel panel-default" style="overflow-wrap: break-word;">
						<div class="panel-body">
							<p><b>Berita</b></p>
							<hr>
						</div>
						@section('body')
						@show
						
					</div>
				</div>	

			</div>
			<div class="row">	

			</div>
		</div>

		
		<!-- layout kanan -->
		<div class="col-md-12 col-lg-4 sidebar">
			<!-- card -->

			<div class="panel panel-default">
				<div class="panel-heading">Postingan Populer</div>
				<div class="panel-body">
					Panel content
				</div>
			</div>
			<!-- card -->
			<!-- card -->
			<div class="panel panel-default">
				<div class="panel-heading">Panel heading</div>
				<div class="panel-body">
					Panel content
				</div>
			</div>
			<!-- card -->
		</div>

	</div>
</div>
</div>

<br>	
<footer>
	<div class="container panel panel-footer">
		<h4>footer</h4>
		<br>
		<p>
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
		<br>
		<br>
			© Copyright 2018 
			<a href="https://web.facebook.com/reza.pointblank02">M Meidy F</a>
			 - All Rights Reserved
		</p>
		
	</footer>
	
</div>

	<script type="text/javascript">
		var konten = {
			document.getElementById("konten")    
		};
		CKEDITOR.replace(konten,{
			language:'en-gb'
		});
		CKEDITOR.config.allowedContent = true;
	</script>
	<script type="text/javascript" src="{{asset('js/app.js') }}"></script>
	
</body>
</html> 









































