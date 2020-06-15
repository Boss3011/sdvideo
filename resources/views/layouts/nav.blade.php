<nav class="navbar navbar-expand-lg fixed-top bg-danger " >
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="{{route('frontend.landing')}}" rel="tooltip" title="Coded by Creative Tim" data-placement="bottom">
          soar_logic
        </a>
        <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-bar bar1"></span>
          <span class="navbar-toggler-bar bar2"></span>
          <span class="navbar-toggler-bar bar3"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse justify-content-end" id="navigation">
        <ul class="navbar-nav">
          <li class="nav-item">
           <!-- Example single danger button -->
             <div class="btn-group">
               <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 Categories
               </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  @foreach($categories as $category)
                <a class="dropdown-item" href="{{route('frontend.category',['id'=>$category->id])}}">{{$category->name}}</a>
                 @endforeach
              </div>
          </li>
          <li class="nav-item">
            <!-- Example single danger button -->
              <div class="btn-group">
                <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Myvideos
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    @foreach($myvideos as $myvideo)
                  <a class="dropdown-item" href="{{route('frontend.myvideo',['id'=>$myvideo->id])}}">{{$myvideo->name}}</a>
                   @endforeach
                </div>
          </div>
           </li>
           @guest
           <li class="nav-item">
              <a href="{{url('/login')}}" class="nav-link">Login</a>
           </li>
           <li class="nav-item">
            <a href="{{url('/register')}}" class="nav-link">Register</a>
         </li>
         @else
         <li class="nav-item">
          <!-- Example single danger button -->
            <div class="btn-group">
              <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ Auth::user()->name }}
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="{{route('frontend.profile',['id'=>auth()->user()->id])}}" >Profile</a>
                <a class="dropdown-item" href="{{route('admin.home')}}" >Admin</a>
                <a class="dropdown-item" href="{{ route('logout') }}"
                              onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                             {{ __('Logout') }}
                    </a>
             <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                 @csrf
             </form>
        </div>
         </li>
         @endguest
         <li>
          <form class="form-inline ml-auto" style="margin-top: 15px" action="{{route('home')}}">
            <div class="form-group has-white">
              <input type="text" name="search" class="form-control" placeholder="Search">
            </div>
        </form>
         </li>
        </ul>
      </div>
    </div>
  </nav>