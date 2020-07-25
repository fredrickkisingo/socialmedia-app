<header>
  <nav class="navbar navbar-inverse " style="background-color: #e3f2fd;">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="{{ route('dashboard') }}">SugarApp</a>
      </div>
      @if(Auth::user())
      <ul class="nav navbar-nav navbar-right">
        <li><a href="{{'account'}}"> Account</a></li>
      <li><a href="{{'logout'}}">Logout</a></li>
      </ul>
      @endif
    </div>
  </nav>
</header>