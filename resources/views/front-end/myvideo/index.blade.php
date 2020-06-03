@extends('layouts.app')
@section('title',$myvideo->name)
@section('meta_keywords',$myvideo->meta_keywords)
@section('meta_des',$myvideo->meta_des)
@section('content')
<div class="section section-buttons">
  <div class="container">
   <div class="title">
       <h2>{{$myvideo->name}}</h2>
   </div>
   @include('front-end.shared.video-row')
 </div>
</div>
@endsection
