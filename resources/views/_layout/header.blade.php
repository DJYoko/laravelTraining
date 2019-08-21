<header class="bg-light">
  <div class="container">
    <ul>
      @if(Auth::check())
      <li class="nav-item">{{ \Auth::user()->name}}</li>
      <li class="nav-item"><a href="{{ route('logout') }}">Logout</a></li>
      @else
      <li class="nav-item">Guest User</li>
      <li class="nav-item"><a href="{{ route('login') }}">Login</a></li>
      <li class="nav-item"><a href="{{ route('register') }}">Register</a></li>
      @endif
    </ul>
  </div>
</header>
<style>
  .nav-item {
    display: inline-block;
    margin-left: 20px;
  }
</style>
