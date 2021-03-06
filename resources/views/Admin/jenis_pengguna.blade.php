@extends('layout.admin')

@section('body')
<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Jenis Pengguna</h3>
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
          <a href="{{url('buat\jenis_pengguna')}}" class="btn btn-default"><span class="fa fa-plus"></span>  Tambah</a>
          
          <div class="clearfix"></div>
        </div>
        @if (Session::has('informasi'))
        <div class="alert alert-info">
          <strong>Informasi :</strong>
          {{Session::get('informasi')}}
        </div>
        @endif
        <div class="x_content">
          <table class="table">
            <thead>
              <tr>
                <th> No. </th>
                <th> Nama </th>
                <th> Keterangan </th>
                <th> Aksi </th>
              </tr>
            </thead>
            <tbody>
              <?php $x=1;?>
              @foreach ($data as $dataa)
              <tr>
                <td>{{ $x++ }}</td>
                <td>{{ $dataa->nama or 'data kosong' }}</td>
                <td>{{ $dataa->keterangan or 'data kosong' }}</td>

                <td>
                  <div class="btn-group" role="group">
                    <a href="{{url('edit/jenis_postingan/'.$dataa->id)}}" class="btn btn-warning btn-xs" data-toggle="tooltip" data-placement="top" title="Ubah"><i class="fa fa-pencil"></i></a> 
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