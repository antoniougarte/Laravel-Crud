@extends('layouts.app')

@section('title', $pageTitle)
<div class=buttons>
  <button>
      <a href="{{route('post.index')}}">Back</a>
  </button>
</div>
@section('content')
  @if(isset($post))
  <div class="container">
        <h1>{{ $post->name}}</h1>
        <p>{{ $post->description }}</p>
  </div>
  @endif
@endsection
