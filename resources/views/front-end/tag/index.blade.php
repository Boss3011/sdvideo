@extends('layouts.app')
@section('title',$tag->name)
@section('meta_keywords',$tag->meta_keywords)
@section('meta_des',$tag->meta_des)
@section('content')
<div class="section section-buttons section-dark">
  <div class="container">
   <div class="title">
       <h2 style="color: white">{{$tag->name}}</h2>
   </div>
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
@endsection
