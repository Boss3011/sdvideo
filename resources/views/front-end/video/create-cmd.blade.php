@if(auth()->user())
    <form action="{{route('frontend.commentStore',['id'=>$video->id])}}" method="POST">
      {{ csrf_field() }}
      <div class="form-group">
        <label for="">Add Comment</label>
        <textarea name="comment" class="form-control" rows="4"></textarea>
      </div>
    <button type="submit" class="btn btn-warning">Add comments</button>
    </form>
    @endif