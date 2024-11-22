<nav class="navbar navbar-expand-lg bg-body-tertiary bg-primary" data-bs-theme="dark">
  <div class="container">
    <a class="navbar-brand" href="/">Imhotep Example Blog</a>

    <a href="/lang/toggle" class="switch-language">@if($language === 'ru') EN @else RU @endif</a>

    <div>
      @guest
        <a class="btn btn-outline-success" href="/auth/login">{{ lang('Login') }}</a>
      @else
        <div class="input-group flex-nowrap">
          <span class="input-group-text">{{ lang('Hello') }}, {{$auth->login}}</span>
          <a class="btn btn-outline-warning" href="/auth/logout">{{ lang('Logout') }}</a>
        </div>
      @endif
    </div>
  </div>
</nav>