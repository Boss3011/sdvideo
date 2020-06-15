@extends('layouts.app')
@section('title',$video->name)
@section('meta_keywords',$video->meta_keywords)
@section('meta_des',$video->meta_des)
@section('content')
<div class="section section-buttons section-dark">
  <div class="container">
   <div class="title">
       <h2 style="color: white">{{$video->name}}</h2>
   </div>
   <div class="row">
     <div class="col-md-12">
    <iframe width="100%" height="500"  src="{{url($video->youtube)}}" style="margin-bottom:20px " frameborder="0" allowfullscreen></iframe>
   <br>
     </div>
   </div>
   <div class="row" style="color: white">
    <div class="col-md-6" style="color: white" >
      <p>
        <span style="margin-right: 20px" style="color: white">
          <i class="nc-icon nc-user-run" style="color: white"></i> : {{$video->user->name}} 
        </span>
        <span style="margin-right: 20px">
          <i class="nc-icon nc-paper"></i> : {{$video->created_at}}
        </span>
        <span style="margin-right: 20px">
            <i class="nc-icon nc-single-copy-04"></i> : <a href="{{route('frontend.category',['id'=>$video->cat->id])}}">
            {{$video->cat->name}}
          </a>
        </span>
      </p>
      <p>{{$video->des}}</p>
      </div>
   <div class="col-md-3" style="color: white">
     <h6>Tags</h6>
      <p>
        @foreach ($video->tags as $tag)
        <a href="{{route('frontend.tags',['id'=>$tag->id])}}">
          <span class="badge badge-info">{{$tag->name}}</span>
        </a>
        @endforeach
      </p>
   </div>
   <div class="col-md-3">
    <h6>Myvideos</h6>
      <p>
        @foreach ($video->myvideos as $myvideo)
        <a href="{{route('frontend.myvideo',['id'=>$myvideo->id])}}">
          <span class="badge badge-info">{{$myvideo->name}}</span>
        </a>
        @endforeach
      </p>
   </div>
   </div>
   <br><br>
   @include('front-end.video.comments')
   @include('front-end.video.create-cmd')
   <br><br>
   @include('front-end.shared.video-row')
   @include('front-end.home-page-sections.theme')
   <div class="row">
    <div class="col-lg-12">   
       {{$videos->links()}}
    </div> 
   </div>
   @include('front-end.home-page-sections.theme')
 </div>
  </div>
</div>
@endsection
