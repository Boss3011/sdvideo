@extends('layouts.app')
@section('title',$video->name)
@section('meta_keywords',$video->meta_keywords)
@section('meta_des',$video->meta_des)
@section('content')
<div class="section section-buttons">
  <div class="container">
   <div class="title">
       <h2>{{$video->name}}</h2>
   </div>
   <div class="row">
     <div class="col-md-12">
   @php
      $url=getYoutubeId($video->youtube)
   @endphp
   @if($url)
   <iframe width="100%" height="500" src="https://www.youtube.com/embed/{{$url}}" style="margin-bottom:20px " frameborder="0" allowfullscreen></iframe>
   <br>
   @endif
     </div>
   </div>
   <div class="row">
    <div class="col-md-6" >
      <p>
        <span style="margin-right: 20px">
          <i class="nc-icon nc-user-run"></i> : {{$video->user->name}}
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
   <div class="col-md-3">
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
  </div>
</div>
@endsection
