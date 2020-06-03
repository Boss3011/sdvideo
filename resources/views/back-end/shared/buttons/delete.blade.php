<form action="{{route($routeName.'.destroy',['id'=>$row])}}" method="POST">
    {{ csrf_field() }}
    {{method_field('delete')}}
    <button type="submit" rel="tooltip" title="" class="btn btn-danger btn-link btn-sm" data-original-title="Remove{{$sModuleName}}">
      <i class="material-icons">close</i>
    </button>
  </form>