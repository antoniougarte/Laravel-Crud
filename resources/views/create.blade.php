
@extends('layouts.app')

@section('title', $pageTitle)
<div class=buttons>
  <button>
      <a href="{{route('post.index')}}">Back</a>
  </button>
</div>
@section('content')
  <form method="POST" action="{{ route('post.store') }}">
    @csrf

    <label>Name Post:</label>
    <br>
    <input type="text" name="name"><br>
    @error('name')
      <p>{{$message }}</p>
    @enderror

    <label>Description Post:</label>
    <br>
    <input type="text" name="description"><br>
    @error('description')
        <p>{{$message }}</p>
    @enderror

    <label>Author Post:</label>
    <br>
    <input type="text" name="author"><br><br>
    @error('author')
      <p>{{$message }}</p>
    @enderror

    <input type="submit" value="Submit">
  </form> 
@endsection

