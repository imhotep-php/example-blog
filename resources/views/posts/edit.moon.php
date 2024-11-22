@extends('layouts.default')

@section('content')
  <div class="row mb-4 align-items-center">
    <div class="col">
      <h1>{{ lang('Edit Post') }}</h1>
    </div>
    <div class="col-auto ml-auto">
      <a href="{{ route('posts.show', ['slug' => $post->slug]) }}" class="btn btn-secondary">{{ lang('Back') }}</a>
    </div>
  </div>

  <form action="{{ route('posts.edit', ['id' => $post->id]) }}" method="post">

    <div class="mb-3">
      <label class="form-label">{{ lang('Title') }}</label>
      <input name="title" type="text" @class(['form-control', 'is-invalid' => $errors->has('title')]) value="{{ $post->title }}">
      @if($errors->has('title'))
        <div class="invalid-feedback">{{$errors->first('title')}}</div>
      @endif
    </div>

    <div class="mb-3">
      <label class="form-label">{{ lang('Text') }}</label>
      <textarea name="text" @class(['form-control', 'is-invalid' => $errors->has('text')]) rows="6">{{ $post->text }}</textarea>
      @if($errors->has('text'))
        <div class="invalid-feedback">{{$errors->first('text')}}</div>
      @endif
    </div>

    <button type="submit" class="btn btn-primary">{{ lang('Submit') }}</button>
  </form>
@endsection