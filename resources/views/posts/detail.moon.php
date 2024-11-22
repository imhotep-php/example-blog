@extends('layouts.default')

@section('content')
  <div class="row mb-4 align-items-center">
    <div class="col-12 col-md">
      <h1>{{$post->title}}</h1>
    </div>
    <div class="ml-auto col-12 col-md-auto order-first order-md-last mb-4 mb-md-0">
      <a href="/" class="btn btn-secondary">{{ lang('Back To List') }}</a>

      @if($auth->id === $post->userId)
        <a href="{{ route('posts.edit', ['id' => $post->id]) }}" class="btn btn-primary">{{ lang('Edit') }}</a>
        <a href="{{ route('posts.remove', ['id' => $post->id]) }}" class="btn btn-danger">{{ lang('Delete') }}</a>
      @endif
    </div>
  </div>

  <div class="mb-4">{!! $post->text() !!}</div>

  <div class="text-muted">{{ lang('Created At') }}: {{date("d.m.Y H:i", strtotime($post->createdAt))}}</div>
  <div class="text-muted">{{ lang('Updated At') }}: {{date("d.m.Y H:i", strtotime($post->updatedAt))}}</div>
@endsection