<table class="table" id="comments">
    <tbody>
        @foreach ($comments as $comment)
      <tr>
        <td>
          @if( $comment->user != null )
        <small>{{$comment->user->name}}</small>
        <p>{{$comment->comment}}</p>
        <small>{{$comment->created_at}}</small>
        @endif
        </td>
        <td class="td-actions text-right">
            <button type="button" rel="tooltip" title="" onclick="$(this).closest('tr').next('tr').slideToggle()" class="btn btn-primary btn-link btn-sm" data-original-title="Edit comment">
              <i class="material-icons">edit</i>
            </button>
            <a href="{{route('comment.delete',['id'=>$comment->id])}}" rel="tooltip"  class="btn btn-danger btn-link btn-sm" data-original-title="Remove comment">
              <i class="material-icons">close</i>
            <div class="ripple-container"></div></a>
          </td>
      </tr>
      <tr style="display: none">
        <td colspan="4">
          <form action="{{route('comment.update',['id'=>$comment->id])}}" method="POST">
            {{ csrf_field() }}
        @include('back-end.comments.form',['row'=>$comment])
        <input type="hidden" value="{{$row->id}}" name="video_id">
        <button type="submit" class="btn btn-primary pull-right">Update Comment</button>
        <div class="clearfix"></div>
        </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>