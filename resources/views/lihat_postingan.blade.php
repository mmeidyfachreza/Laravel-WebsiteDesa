@extends('layout.master')
<style>
.display-comment .display-comment {
  margin-left: 40px
}
</style>
@section('body')
  <div class="panel-body">
    <div class="col-md-11 text-center">
      <img class="img-fluid rounded mb-3 mb-md-0" src="{{asset('image/'.$data->gambar)}}" style="width: 50%;">
    </div>
  </div>
  <div class="panel-body">
    <ul class="breadcrumb">
       <li> oleh <a href="#">{{$data->user->name}}</a>  </li>
       <li> {{$data->created_at->toDayDateTimeString()}} </li>
    </ul>
    <h2> {{$data->judul}}</h2>
    <div class="space-30"></div>

  </div>
  <div class="panel-body" >{!!$data->isi!!}</div> 
  <hr>
  <div class="panel-body">
  <div id="comments" class="comments-area">
    <h3 class="comment-heading">{{$data->comments->count()}} Komentar</h3>
    <ul class="comments-list">
      @include('_comment_replies', ['comments' => $data->comments, 'post_id' => $data->id])
    </ul>
    <div class="comment-respond">
      <h4>Tambahkan Komentar</h4>
      <form method="post" action="{{ route('comment.add') }}" class="comment-form">
        {{csrf_field()}}
        @if(Auth::check())
        <div class="form-double">
          <div class="box">
            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="{{asset('img/meidy.jpg')}}" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>{{Auth::user()->roles->first()->nama}}</span>
                <h4>{{ Auth::user()->name }}</h4>
              </div>
              <div class="clearfix"></div>
            </div>

            <div class="space-10"></div>
          </div>
        </div>
        @else
        <div class="form-double">
          <div class="box">
            <input type="text" name="nama" class="form-control" placeholder="your Name">
            <div class="space-30"></div>
          </div>
          <div class="box last">
            <input type="email" name="email" class="form-control" placeholder="Your Email">
            <div class="space-30"></div>
          </div>
        </div>
        @endif
        <input type="hidden" name="post_id" value="{{ $data->id }}" />
        <textarea name="comment_body" id="comment" rows="5" class="form-control" placeholder="Type Your Mesage..."></textarea>
        <div class="space-30"></div>
        <button type="submit" class="btn btn-info">Post Komentar</button>
      </form>
    </div>
  </div>
</div>
@endsection