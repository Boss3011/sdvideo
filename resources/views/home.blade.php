@extends('layouts.app')
@section('content')
<div class="section section-dark section-dark section-buttons">
  <div class="container">
    <form  style="margin-top: 15px"  action="{{route('home')}}">
      <div class="form-group section-dark ">
        <input type="text" name="search" class="form-control section-dark" placeholder="Search by category name">
      </div>
      <div class="col-md-12">
        @foreach($categories as $category)
        <a class="btn btn-dark btn-sm btn-round "  href="{{route('frontend.category',['id'=>$category->id])}}" style="margin-top: 30px">{{$category->name}}</a>
         @endforeach
        <button type="submit" class="btn btn-white btn-sm btn-round pull-right " style="margin-top: 30px" style="margin-right:100px">All recommendations</button>
             </div>
  </form>
   <div class="title">
    <h2 class="title">Videos Library</h2>
       @if(request()->has('search') && request()->get('search')!='')
       <p style="margin-top:10px" style="color:white">
        you are search on <b>{{request()->get('search')}}</b> | <a href="{{route('home')}}" style="color:white">Reset</a>
        </p>   
       @endif
   </div>
<br>
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
