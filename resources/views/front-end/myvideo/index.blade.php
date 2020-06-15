@extends('layouts.app')
@section('title',$myvideo->name)
@section('meta_keywords',$myvideo->meta_keywords)
@section('meta_des',$myvideo->meta_des)
@section('content')
<div class="section section-dark  section-buttons">
  <div class="container">
   <div class="title">
       <h2 style="color:white">{{$myvideo->name}}</h2>
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
