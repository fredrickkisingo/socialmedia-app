<!DOCTYPE html>
<html>
        <head>
          <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        </head>
    <body>  
  <nav>
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="{{ route('dashboard') }}"><img class="buyu" src="{{url('images/buyu.png')}}"></a>
      </div>
     <button class="burger" id="burger">
        &#9776
    </button>
    @if(Auth::user())
  </div>
    <ul class="nav navbar-nav navbar-right">
      
      <li><a href="{{'account'}}"> Account</a></li>
    <li><a href="{{'logout'}}">Logout</a></li>
    </ul>
    @endif
</nav>
<script src="index.js"></script>
    </body>
</html>