<div class="card text-left" id='profileCard' style="margin-top: 20px;display:none">
    <div class="card-header text-center">
    Update Profile
    </div>
    <div class="card-body">
        <form action="{{route('profile.update')}}" method="POST">
                {{ csrf_field() }}
                @php
                $input="name";    
                @endphp
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group bmd-form-group">
                      <label class="bmd-label-floating">Username</label>
                      <input type="text" name={{$input}} value="{{isset($user) ? $user->{$input}:''}}" class="form-control  @error($input) is-invalid @enderror">
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
                      <input type="email"  name={{$input}} value="{{isset($user) ? $user->{$input}:''}}" class="form-control  @error($input) is-invalid @enderror">
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
                  <div class="col-md-6">
                    <button type="submit" class="btn btn-primary btn-sm btn-round " style="margin-top: 30px">Update Profile</button>
                    </div>
            </div>
            </form>
    </div>
  </div>
