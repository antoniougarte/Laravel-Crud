@extends('layouts.app')

@section('title', $pageTitle)

<div class=buttons>
    <button>
        <a href="{{route('post.create')}}">Crear nuevo post</a>
    </button>
  </div>
@section('content')
    @foreach($posts as $post)
        <div class="post-container">
            <h2>
                <a href="{{ route('post.show', ['id' => $post->id]) }}">
                    {{ $post->name }}
                </a>
            </h2>
            <p>{{ $post->description }}</p>
            <button>
                <a 
                  href="{{ route('post.edit', ['id' => $post->id]) }}"
                >
                  Editar post
                </a>
            </button>
            <form action="{{ route('post.destroy', ['id' => $post->id]) }}"
                method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Eliminar post</button>
            </form>
        </div>
    @endforeach
@endsection
