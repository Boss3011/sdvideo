<div class="row">
    <div class="col-lg-12 col-md-12">
      <div class="card">
        <div class="card-header card-header-warning">
          <h4 class="card-title">Video Details</h4>
          <p class="card-category">Here you can see Video Details</p>
        </div>
        <div class="card-body table-responsive">
          <table class="table table-hover">
            <thead class="text-warning">
              <tr><th>ID</th>
              <th>Name</th>
              <th>Video</th>
              <th>Comments</th>
              <th>Date</th>
              <th>Control</th>
            </tr></thead>
            <tbody>
                @foreach ($comments as $comment)
                <tr>
                    <td>{{$comment->id}}</td>
                    <td>
                      @if( $comment->user != null )
                        <a href="{{route('users.edit',['id'=>$comment->user->id])}}">
                        {{$comment->user->name}}
                        </a>
                        @endif
                    </td>
                    <td>
                      @if( $comment->video != null )
                        <a href="{{route('videos.edit',['id'=>$comment->video->id])}}">
                        {{$comment->video->name}}
                        </a>
                        @endif
                    </td>
                    <td>{{$comment->comment}}</td>
                    <td>{{$comment->created_at}}</td>
                    <td>
                        <a href="{{route('comment.delete',['id'=>$comment->id])}}">
                            delete
                        </a>
                    </td>
                  </tr>
                @endforeach
            </tbody>
          </table>
          {!!$comments->links()!!}
        </div>
      </div>
    </div>
  </div>