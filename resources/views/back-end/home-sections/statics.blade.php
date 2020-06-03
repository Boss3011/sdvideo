<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-header card-header-warning card-header-icon">
          <div class="card-icon">
            <i class="fa fa-video-camera"></i>
          </div>
          <p class="card-category">Videos</p>
          <h3 class="card-title">{{\App\Models\Video::count()}}
          </h3>
        </div>
        <div class="card-footer">
          <div class="stats">
            <i class="fa fa-video-camera"></i>
            <a href="{{route('videos.index')}}">All Videos</a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-header card-header-success card-header-icon">
          <div class="card-icon">
            <i class="material-icons">store</i>
          </div>
          <p class="card-category">Myvideos</p>
          <h3 class="card-title">{{\App\Models\Myvideo::count()}}</h3>
        </div>
        <div class="card-footer">
          <div class="stats">
            <i class="fa fa-book"></i>
            <a href="{{route('myvideos.index')}}">My Videos</a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-header card-header-danger card-header-icon">
          <div class="card-icon">
            <i class="fa fa-tags"></i>
          </div>
          <p class="card-category">Tags</p>
          <h3 class="card-title">{{\App\Models\Tag::count()}}</h3>
        </div>
        <div class="card-footer">
          <div class="stats">
            <i class="fa fa-tags"></i>
            <a href="{{route('tags.index')}}">Tags</a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-header card-header-info card-header-icon">
          <div class="card-icon">
            <i class="fa fa-comments"></i>
          </div>
          <p class="card-category">Comments</p>
          <h3 class="card-title">{{\App\Models\Comments::count()}}</h3>
        </div>
        <div class="card-footer">
          <div class="stats">
            <i class="material-icons">update</i>
            <a href="{{route('videos.index')}}">check videos</a>
          </div>
        </div>
      </div>
    </div>
  </div>  