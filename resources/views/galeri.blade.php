@extends('layout.master')
<style>
div.gallery {
    margin: 5px;
    border: 1px solid #ccc;
    float: left;
    width: 220px;

}

div.gallery:hover {
    border: 1px solid #777;
}


div.desc {
    padding: 15px;
    text-align: center;
}

div .gallery .gambar {
    position: relative;
    float: left;
    width:  220px;
    height: 220px;
    background-position: 50% 50%;
    background-repeat:   no-repeat;
    background-size:     cover;
}
</style>

@section('body')
<div class="panel-body">
	@foreach($data as $galeri) 
		<div class="gallery">	
		<div class="gambar" style="background-image:url('{{asset('image/'.$galeri->foto)}}');"></div>
		<div class="desc">{{$galeri->deskripsi}}</div>
		</div>

	@endforeach
</div>	
@endsection