<header class="bg-light">
  <div class="container py-3">
    <ul class="nav">
      <li class="nav-item"><a href="{{ route('topIndex') }}">トップ</a></li>
      @if(Auth::check())
      <li class="nav-item"><a href="{{ route('indexHome') }}">マイページ</a></li>
      <li class="nav-item">{{ \Auth::user()->name}}</li>
      <li class="nav-item"><a href="{{ route('logout') }}">{{ __('Logout') }}</a></li>
      @else
      <li class="nav-item"><a href="{{ route('login') }}">{{ __('Login') }}</a></li>
      <li class="nav-item"><a href="{{ route('register') }}">{{ __('Register') }}</a></li>
      @endif
      <li class="nav-item">
        <select id="set-lang">
          <option value="default">Lang/言語</option>
          <option value="en">English</option>
          <option value="ja">日本語</option>
        </select>
      </li>
    </ul>
  </div>
</header>
<style>
  .nav-item {
    display: inline-block;
    margin-left: 20px;
    padding: 8px;
  }
</style>
<script>
  $(function() {
    $('#set-lang').on('change', function() {
      const selectedLanguage = $(this).val();
      if (selectedLanguage === 'default') {
        return false;
      }
      location.href = "/lang/" + selectedLanguage;
    });
  });
</script>
