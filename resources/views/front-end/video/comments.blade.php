<div class="row" id="comments">
    <div class="col-md-12">
      <div class="card card-nav-tabs text-left section-dark">
        <div class="card-header card-header-primary section-dark">
          @php
              $comments=$video->comments
          @endphp
          <h4 style="color: white">comments ({{count($comments)}})</h4>
        </div>
        <div class="card-body section-dark">
          @foreach ($comments as $comment)
          <div class="row">
            <div class="col-md-8" style="color: white">
              @if( $comment->user != null )
              <i class="nc-icon nc-chat-33" style="color: white"></i> :
              <a href="{{route('frontend.profile',['id'=>$comment->user->id,'slug'=>slug($comment->user->name)])}}" style="color: white"> {{$comment->user->name}}</a>
            @endif
            </div>
            <div class="col-md-4 text-right" style="color: white" >
            <span>
              <i class="nc-icon nc-paper" style="color: white"></i> : {{$comment->created_at}} |
            </span>
            </div>
          </div>
        <p style="color: white">{{$comment->comment}}</p>
        @if( $comment->user != null )
        @if(auth()->user())
        @if ((auth()->user()->group=='admin') ||auth()->user()->id==$comment->user->id)
        <a href="" onclick="$(this).next('div').slideToggle(1000);return false;" style="color: white">edit</a>
        <div style="display: none">
        <form action="{{route('frontend.commentUpdate',['id'=>$comment->id])}}" method="POST">
          {{ csrf_field() }}
          <div class="form-group">
            <textarea name="comment" class="form-control section-dark" rows="4"></textarea>
          </div>
        <button type="submit" class="btn btn-info">Edit</button>
        </form>
        </div>    
        @endif
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