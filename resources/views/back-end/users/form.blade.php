{{ csrf_field() }}
@php
$input="name";    
@endphp
<div class="row">
  <div class="col-md-6">
    <div class="form-group bmd-form-group">
      <label class="bmd-label-floating">Username</label>
      <input type="text" name={{$input}} value="{{isset($row) ? $row->{$input}:''}}" class="form-control  @error($input) is-invalid @enderror">
      @error($input)
      <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
     @enderror
    </div>
  </div>
@php
$input="email";    
@endphp
  <div class="col-md-6">
    <div class="form-group bmd-form-group">
      <label class="bmd-label-floating">Email address</label>
      <input type="email"  name={{$input}} value="{{isset($row) ? $row->{$input}:''}}" class="form-control  @error($input) is-invalid @enderror">
      @error($input)
      <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
     @enderror
    </div>
  </div>
  
  <div class="col-md-6">
    <div class="form-group bmd-form-group">
      <label class="bmd-label-floating">Password</label>
      <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
      @error('password')
      <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
     @enderror
    </div>
  </div>
  @php
  $input="group";    
  @endphp
    <div class="col-md-6">
      <div class="form-group bmd-form-group">
        <label for="bmd-label-floating">User Group</label>
        <select id="bmd-label-floating" name="{{$input}}" class="form-control  @error($input) is-invalid @enderror">
          <option value="admin" {{isset($row) && $row->{$input} == 'admin' ? 'selected':''}}>admin</option>
          <option value="user" {{isset($row) && $row->{$input} == 'user' ? 'selected':''}}>user</option>
        </select>
        @error($input)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
       @enderror
      </div>
    </div>
</div>