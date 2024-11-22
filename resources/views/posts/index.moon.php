@extends('layouts.default')

@section('content')
  <div class="row mb-4 align-items-center">
    <div class="col">
      <h1>{{ lang('All Posts') }}</h1>
    </div>
    <div class="col-auto ml-auto">
      <a href="{{ route('posts.add') }}" class="btn btn-primary">{{ lang('New Post') }}</a>
    </div>
  </div>

  <hr class="mb-4" />

  @if ( (! empty($q) && empty($posts)) || ! empty($posts) )
    <form action="/" method="GET">
      <div class="input-group mb-2">
        <input name="q" type="text" class="form-control" placeholder="{{ lang('Enter search') }}" value="{{$q}}">
        <button class="btn btn-outline-secondary">{{ lang('Search') }}</button>
      </div>
    </form>
  @endif

  @if (empty($posts))
    <div class="alert alert-primary mt-4" role="alert">
      {{ lang('Posts not found') }}
    </div>
  @else
    <div class="row">
      @foreach($posts as $post)
        <div class="col-12 col-md-6">
          <div class="card mt-3">
            <div class="card-body">
              <div class="card-text text-muted"><small>{{ date("d.m.Y", strtotime($post->updatedAt)) }}</small></div>
              <h5 class="card-title"><a href="{{ route('posts.show', ['slug' => $post->slug]) }}">{{$post->title}}</a></h5>
              <p class="card-text">{{ $post->description() }}</p>
              <a href="{{ route('posts.show', ['slug' => $post->slug]) }}" class="btn btn-primary">{{ lang('More') }}</a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  @endif
@endsection