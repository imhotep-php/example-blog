@extends('layouts.default')

@section('content')
  <h1 class="mb-4">{{ lang('Auth') }}</h1>

  <hr class="mb-4" />

  <p class="alert alert-info">{{ lang('Auth Register Text') }}</p>

  <form action="/auth/login" method="POST">

    <div class="mb-3 has-validation">
      <label class="form-label">{{ lang('Username') }}</label>
      <input name="login" type="text" @class(['form-control', 'is-invalid' => $errors->has('login')]) value="{{$login}}">
      @if($errors->has('login'))
        <div class="invalid-feedback">{{$errors->first('login')}}</div>
      @endif
    </div>

    <div class="mb-3">
      <label class="form-label">{{ lang('Password') }}</label>
      <input name="password" type="password" @class(['form-control', 'is-invalid' => $errors->has('password')])>
      @if($errors->has('password'))
        <div class="invalid-feedback">{{$errors->first('password')}}</div>
      @endif
    </div>

    <button type="submit" class="btn btn-primary mb-3">{{ lang('Submit') }}</button>

  </form>
@endsection