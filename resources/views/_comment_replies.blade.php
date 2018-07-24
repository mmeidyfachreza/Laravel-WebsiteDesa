@foreach($comments as $comment)
{{-- <div>
    <div class="display-comment" >
        <strong>{{ $comment->user->name }}</strong>
        <p>{{ $comment->body }}</p>
        <a href="" id="reply"></a>
        <form method="post" action="{{ route('reply.add') }}">
            {{csrf_field()}}
            <div class="form-group">
                <input type="text" name="comment_body" class="form-control" />
                <input type="hidden" name="post_id" value="{{ $post_id }}" />
                <input type="hidden" name="comment_id" value="{{ $comment->id }}" />
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-warning" value="Reply" />
            </div>
        </form>
        @include('_comment_replies', ['comments' => $comment->replies])
    </div>
</div> --}}
<li>
    <article class="comment">
        <figure class="comment-pic">
            <img alt="" src="{{asset('img/meidy.jpg')}}">
        </figure>
        <div class="comment-content">
            <div class="comment-header">
            <h4>{{$comment->user->name or $comment->guest}}</h4>
                <p class="comment-date">Posted on {{ $comment->created_at }}</p>
            </div>
            <p>{{ $comment->body }}</p>
            <ul class="breadcrumb">
                <li><a href="#">Reply</a></li>
                <li><a href="#">Share</a></li>
            </ul>
        </div>
    </article>
    <ul>
        @include('_comment_replies', ['comments' => $comment->replies])
    </ul>
</li>
@endforeach