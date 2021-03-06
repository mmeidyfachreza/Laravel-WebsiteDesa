@extends('layout.penulis')

@section('body')

<div class="x_panel">
	<div class="x_title">

		<h2>Edit Postingan<small>beta</small></h2>
		<ul class="nav navbar-right panel_toolbox">
			<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
			</li>
			<li>
				
			</li>
		</ul>

		<div class="clearfix"></div>
	</div>
	<div class="x_content">
		@if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div><br/>
    @endif
    <form class="form-horizontal form-label-left" action="{{action('postinganController@update', $id)}}" enctype="multipart/form-data" method="post">
     {{csrf_field()}}
      <input name="_method" type="hidden" value="PATCH">
     <div class="form-group">
        <label class="control-label col-md-3" for="first-name">Judul 
        </label>
        <div class="col-md-7">
            <input type="text" name="judul" id="judul" class="form-control col-md-7 col-xs-12" value="{{$postingan->judul}}">
        </div>
    </div>
    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12">Kategori</label>
      <div class="col-md-9 col-sm-9 col-xs-12">
        <select class="form-control" id="divisi" name="divisi"> 

          <option>SYAMIL</option>
          <option>KPSDM</option>
          <option>BUD</option>

        </select>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-md-3" for="last-name">Gambar <span class="required"></span>
      </label>
      <div class="col-md-7">
       <input type="file" name="gambar" id="gambar" value=" value="{{$postingan->gambar}}"">	
     </div>
   </div>

   <div class="ln_solid"></div>

   <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">Isi Konten</label>
    <div class="col-md-9 col-sm-9 col-xs-12">
      <textarea id="konten" class="form-control" name="konten" rows="10" cols="50">{{$postingan->isi}}</textarea>
    </div>
  </div>
  <div class="ln_solid"></div>
  <input class="btn btn-warning" type="submit" />
</form>
</div>
</div>
@endsection