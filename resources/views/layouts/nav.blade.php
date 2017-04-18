<nav class="navbar navbar-toggleable-md navbar-light bg-faded">
        <div class="navbar-header">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#">Student Project Tracker</a>
          </div>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/home">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/projects">Projects</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/home">Upload</a>
      </li>
    </ul>

    <ul class="navbar-nav mr-auto navbar-right">
      @if (Auth::guest())
      <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
      <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
      @else
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#"  id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              {{ Auth::user()->name }} 
        </a>

        <div class="dropdown-menu" style="border-width:1px; background-color:rgba(255,255,255,0); box-shadow:none;" aria-labelledby="dropdownMenuLink">
            <a class="dropdown-item" style="text-align:center;" href="{{ route('logout') }}" onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
                                            Logout
            </a>

            <form class="dropdown-item" id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
            </form>
         </div>   
      </li>
      @endif
    </ul>

    <!--<form class="navbar-form form-inline">
      <input class="form-control" type="text" placeholder="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>-->
  
  </div>
</nav>

<style>
.nav-link{
  text-align:center;
}
</style>