<header>

  <nav class="navbar navbar-expand-md navbar-dark " style="background-color: rgba(22, 22, 22, 0.821)">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="{{ route('dashboard') }}"><img class="buyu" src="{{url('images/buyu.png')}}"></a>
      </div>
      @if(Auth::user())
    </div>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="{{'account'}}"> Account</a></li>
        <br>
      <li><a href="{{'logout'}}">Logout</a></li>
      </ul>
      @endif
    </div>
  </nav>

</header>