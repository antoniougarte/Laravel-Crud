@extends('layouts.app')

@section('title', $pageTitle)
<div class=buttons>
  <button>
      <a href="{{route('post.index')}}">Back</a>
  </button>
</div>
@section('content')
  @if(isset($post))
    <form method="POST" action="{{ route('post.update', ['id' => $post->id]) }}">
      @csrf
      @method('PUT')

      <label for="fname">Name Post:</label><br>
      <input type="text" name="name" value="{{ $post->name }}"><br>

      <label for="lname">Description Post:</label><br>
      <input type="text" name="description" value="{{ $post->description }}"><br>

      <label for="lname">Author Post:</label><br>
      <input type="text" name="author" value="{{ $post->author }}"><br><br>

      <input type="submit" value="Submit">
    </form>
  @endif
@endsection
