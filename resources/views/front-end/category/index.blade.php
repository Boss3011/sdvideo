@extends('layouts.app')
@section('title',$cat->name)
@section('meta_keywords',$cat->meta_keywords)
@section('meta_des',$cat->meta_des)
@section('content')
<div class="section section-dark section-buttons">
  <div class="container">
   <div class="title">
       <h2  style="color:white">{{$cat->name}}</h2>
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
