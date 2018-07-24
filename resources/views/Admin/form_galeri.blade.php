@extends('layout.admin')

@section('body')

<div class="x_panel">
	<div class="x_title">

		<h2>Tambah Foto<small>beta</small></h2>
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
		<form class="form-horizontal form-label-left" action="{{url('/buat/b_galeri')}}" enctype="multipart/form-data" method="post">
			{{csrf_field()}}
			<div class="form-group">
                    <label class="control-label col-md-3">Deskripsi
                    </label>
                    <div class="col-md-7">
                      <textarea class="form-control col-md-7 col-xs-12" required="required" name="deskripsi" rows="3"></textarea>
                    </div>
      </div>
      <div class="ln_solid"></div>  
			<div class="form-group">
				<label class="control-label col-md-3" for="last-name">Foto <span class="required"></span>
				</label>
				<div class="col-md-7">
					<input type="file" name="foto">	
				</div>
			</div>		
		<input class="btn btn-warning" type="submit" />
		</form>
	</div>
</div>
 
@endsection