@extends('layout.master')

@section('body')
				{{-- @foreach($data as $dataa)
				<div class="row">
					<div class="" style="">
						<img class="img-fluid rounded mb-3 mb-md-0" src="{{asset('image/'.$dataa->gambar)}}" style="width: 100%;">
					</div>
					<div class="col-md-7">
						
						<h3>{{$dataa->judul}}</h3>
						<span>{{$dataa->created_at->toDayDateTimeString()}}</span>
						<span style="padding: 30px;width: calc(100 - 200px);">{!!$dataa->isi!!}</span>
						<br>
						<br>
						<div>{!!$dataa->isi!!}</div>
							
						
		
						<a class="btn btn-primary" href="{{url('post/'.$dataa->id)}}">Selengkapnya</a>
						
					</div>
				</div>
				<hr>
				@endforeach --}}
				@foreach($data as $dataa)
				@if($dataa->publikasi)
					<div class="panel-body">
							<div class="post-entry-horzontal">
								<a href="{{url('post/'.$dataa->id)}}">
									<div class="image element-animate" style="background-image: url('{{asset('image/'.$dataa->gambar)}}');"></div>
									<span class="text">
										<div class="post-meta">
											
											<span class="mr-2">{{$dataa->created_at->toDayDateTimeString()}}</span> &bullet;
											<span class="ml-2"><span class="fa fa-comments"></span> jumlah komen</span>
										</div>
										<h2>{{$dataa->judul}}</h2>
									</span>
								</a>
							</div>
						</div>			
				@endif
				@endforeach	
@endsection