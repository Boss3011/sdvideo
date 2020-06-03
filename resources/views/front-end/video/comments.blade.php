<div class="row" id="comments">
    <div class="col-md-12">
      <div class="card card-nav-tabs text-left">
        <div class="card-header card-header-primary">
          @php
              $comments=$video->comments
          @endphp
          <h4>comments ({{count($comments)}})</h4>
        </div>
        <div class="card-body">
          @foreach ($comments as $comment)
          <div class="row">
            <div class="col-md-8">
              <i class="nc-icon nc-chat-33"></i> :
              <a href="{{route('frontend.profile',['id'=>$comment->user->id,'slug'=>slug($comment->user->name)])}}"> {{$comment->user->name}}</a>
            </div>
            <div class="col-md-4 text-right" >
            <span>
              <i class="nc-icon nc-paper"></i> : {{$comment->created_at}} |
            </span>
            </div>
          </div>
        </p>{{$comment->comment}}</p>
        @if(auth()->user())
        @if ((auth()->user()->group=='admin') ||auth()->user()->id==$comment->user->id)
        <a href="" onclick="$(this).next('div').slideToggle(1000);return false;">edit</a>
        <div style="display: none">
        <form action="{{route('frontend.commentUpdate',['id'=>$comment->id])}}" method="POST">
          {{ csrf_field() }}
          <div class="form-group">
            <textarea name="comment" class="form-control" rows="4"></textarea>
          </div>
        <button type="submit" class="btn btn-info">Edit</button>
        </form>
        </div>    
        @endif
        @endif
        @if (!$loop->last)
        <hr> 
        @endif
      @endforeach
        </div>
      </div>
   
    </div>
    </div>