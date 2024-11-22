@extends('layouts.default')

@section('content')
  <div class="row mb-4 align-items-center">
    <div class="col">
      <h1>{{ lang('Add Post') }}</h1>
    </div>
    <div class="col-auto ml-auto">
      <a href="/" class="btn btn-secondary">{{ lang('Back To List') }}</a>
    </div>
  </div>

  <hr class="mb-4" />

  <form action="{{ route('posts.add') }}" method="post">

    <div class="mb-3">
      <label class="form-label">{{ lang('Title') }}</label>
      <input name="title" type="text" @class(['form-control', 'is-invalid' => $errors->has('title')]) value="{{ $title }}">
      @if($errors->has('title'))
        <div class="invalid-feedback">{{$errors->first('title')}}</div>
      @endif
    </div>

    <div class="mb-3">
      <label class="form-label">{{ lang('Text') }}</label>
      <textarea name="text" @class(['form-control', 'is-invalid' => $errors->has('text')]) rows="6">{{ $text }}</textarea>
      @if($errors->has('text'))
        <div class="invalid-feedback">{{$errors->first('text')}}</div>
      @endif
    </div>

    <button type="submit" class="btn btn-primary">{{ lang('Submit') }}</button>
  </form>
@endsection