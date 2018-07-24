@extends('layout.admin')

@section('body')

<div class="x_panel">
	<div class="x_title">

		<h2>Tambah Postingan<small>beta</small></h2>
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
    </div><br />
    @endif
		<form class="form-horizontal form-label-left" action="{{url('/buat/postingan')}}" enctype="multipart/form-data" method="post">
			{{csrf_field()}}
			<div class="form-group">
                    <label class="control-label col-md-3" for="first-name">Judul 
                    </label>
                    <div class="col-md-7">
                      <input type="text" name="judul" id="judul" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
      </div>
      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Kategori</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <select class="form-control" name="kategori"> 
                             @foreach($data as $kategori)
                             <option value="{{$kategori->id}}">{{$kategori->nama}}</option>
                             @endforeach
                          </select>
                        </div>
      </div>
			<div class="form-group">
				<label class="control-label col-md-3" for="last-name">Gambar <span class="required"></span>
				</label>
				<div class="col-md-7">
					<input type="file" name="gambar" id="gambar">	
				</div>
			</div>

                  <div class="ln_solid"></div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Isi Konten</label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <textarea id="konten" class="form-control" name="konten" rows="10" cols="50"></textarea>
                    </div>
                  </div>
		<div class="ln_solid"></div>
		<input class="btn btn-warning" type="submit" />
		</form>
	</div>
</div>
<script>
   var konten = document.getElementById("konten");
   CKEDITOR.replace(konten,{
     language:'en-gb'
   });
   CKEDITOR.config.allowedContent = true;
 </script>
 
@endsection