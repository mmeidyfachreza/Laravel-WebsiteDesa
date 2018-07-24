@extends('layout.admin')

@section('body')

<div class="x_panel">
	<div class="x_title">

		<h2>Tambah Jenis Pengguna<small>beta</small></h2>
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
		<form class="form-horizontal form-label-left" action="{{url('/buat/jenis_pengguna')}}" method="post">
			{{csrf_field()}}
			<div class="form-group">
                    <label class="control-label col-md-3">nama 
                    </label>
                    <div class="col-md-7">
                      <input type="text" name="nama" id="nama" class="form-control col-md-7 col-xs-12">
                    </div>
            </div>
            <div class="form-group">
                    <label class="control-label col-md-3">keterangan 
                    </label>
                    <div class="col-md-7">
                      <input type="text" name="keterangan" id="keterangan" class="form-control col-md-7 col-xs-12">
                    </div>
            </div>
		<div class="ln_solid"></div>
		<input class="btn btn-warning" type="submit" />
		</form>
	</div>
</div>
@endsection