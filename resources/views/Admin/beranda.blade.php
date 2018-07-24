@extends('layout.admin')
@section('body')
<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Beranda</h3>
    </div>

    <div class="title_right">
      <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Cari...">
          <span class="input-group-btn">
            <button class="btn btn-default" type="button">Go!</button>
          </span>
        </div>
      </div>
    </div>
  </div>

  <div class="clearfix"></div>

  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Postingan dari semua User</h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Settings 1</a>
                </li>
                <li><a href="#">Settings 2</a>
                </li>
              </ul>
            </li>
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <table class="table">
            <thead>
              <tr>
                <th> No. </th>
                <th> Judul </th>
                <th> Kategori </th>
                <th> Status Publikasi</th>
                <th> Tanggal Publikasi </th>
                <th> Aksi </th>
              </tr>
            </thead>
            <tbody>
              <?php $x=1;?>
              @foreach ($data as $dataa)
                <tr>
                <td>{{ $x++ }}</td>
                <td>{{ $dataa->judul or 'data kosong' }}</td>
                <td>{{ $dataa->asd or 'data kosong' }}</td>
                <td>
                  <input type="checkbox" id="status" value="{{$dataa->id}}" @if ($dataa->publikasi) checked @endif>Ya
                </td>
                <td>{{ $dataa->created_at->diffforhumans() }}</td>
                <td>
                  <div class="btn-group" role="group">
                    <a href="{{url('postingan/edit/'.$dataa->id)}}" class="btn btn-warning btn-xs" data-toggle="tooltip" data-placement="top" title="Ubah"><i class="fa fa-pencil"></i></a> 
                    <a href="{{url('postingan/'.$dataa->id)}}" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="Lihat"><i class="fa fa-eye"></i></a>
                    <a href="{{url('postingan/hapus/'.$dataa->id)}}" class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fa fa-remove"></i></a>
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div id = 'msg'>This message will be replaced using Ajax. 
         Click the button to replace the message.</div>
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Postinganku</h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Settings 1</a>
                </li>
                <li><a href="#">Settings 2</a>
                </li>
              </ul>
            </li>
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <table class="table">
            <thead>
              <tr>
                <th> No. </th>
                <th> Judul </th>
                <th> Divisi </th>
                <th> Tanggal Publish </th>
                <th> Aksi </th>
              </tr>
            </thead>
            <tbody>
              <?php $x=1;?>
              @foreach ($dataA as $admin)
              <tr>
                <td>{{ $x++ }}</td>
                <td>{{ $admin->judul or 'data kosong' }}</td>
                <td>{{ $admin->divisi or 'data kosong' }}</td>
                <td>{{ $admin->created_at->diffforhumans() }}</td>

                <td>
                  <div class="btn-group" role="group">
                    <a href="{{url('postingan/edit/'.$dataa->id)}}" class="btn btn-warning btn-xs" data-toggle="tooltip" data-placement="top" title="Ubah"><i class="fa fa-pencil"></i></a> 
                    <a href="{{url('postingan/'.$dataa->id)}}" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="Lihat"><i class="fa fa-eye"></i></a>
                    <a href="{{url('postingan/hapus/'.$dataa->id)}}" class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fa fa-remove"></i></a>
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>


</div>
@endsection