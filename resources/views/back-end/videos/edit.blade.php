@extends('back-end.layout.app')
@section('title')
{{$pageTitle}}
@endsection
@section('content')
@component('back-end.layout.header')
@slot('nav_title')
{{$pageTitle}}
@endslot
@endcomponent
@component('back-end.shared.edit',['pageTitle'=>$pageTitle,'pageDes'=>$pageDes])
  <form action="{{route($routeName.'.update',['id'=>$row])}}" method="POST" enctype="multipart/form-data">
      {{method_field('put')}}
      @include('back-end.'.$folderName.'.form')
      <button type="submit" class="btn btn-primary pull-right">update {{$moduleName}}</button>
      <div class="clearfix"></div>
    </form>
    @slot('md4')
  <iframe width="250"  src="{{url($row->youtube)}}" style="margin-bottom:20px " frameborder="0" allowfullscreen></iframe>
 <br>
    <img src="{{url('uploads/'.$row->image)}}" width="250">
    @endslot
@endcomponent

@component('back-end.shared.edit',['pageTitle'=>"Comments",'pageDes'=>"Here We can control comments"])
@include('back-end.comments.index')
@slot('md4')
@include('back-end.comments.create')
@endslot
@endcomponent
@endsection
