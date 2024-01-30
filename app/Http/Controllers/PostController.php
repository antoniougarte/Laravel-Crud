<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index(): View
    {
        $posts = Post::all();
        $pageTitle = 'Lista de Posts';
        return view('index', compact('posts', 'pageTitle'));
    }

    public function create(): View
    {
        // $posts = Post::all();
        $pageTitle = 'Crear nuevo Post';
        return view('create', compact( 'pageTitle'));
    }

    // public function store(Request $request): RedirectResponse
    // {
    public function store(PostRequest $request): RedirectResponse
    {
        // $post = new Post();
        // $post->name = $request->name;
        // $post->description = $request->description;
        // $post->author = $request->author;
        // $post->created_at = now();
        // $post->updated_at = null;
        // $post-> save();

        //Esta es la segunda opcion para crear los datos en la base de datos
        // Post::create([
        //     'name' => $request->name,
        //     'description' => $request->description,
        //     'author' => $request->author,
        // ]);

        // esta es la tercera opcion(para esto el nombre de los requests debe coincidir con los del form)
        Post::create($request->all());
        return redirect()->route('post.index');
    }

    public function show(string $id): View
    {
        $post = Post::find($id);
        $pageTitle = 'Detalle del Post';
        return view('show', compact( 'post', 'pageTitle'));
    }

    public function edit(string $id): View
    {
        $post = Post::find($id);
        $pageTitle = 'Editar Post';
        return view('edit', compact( 'post', 'pageTitle'));
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $post = Post::find($id);
        $post->name = $request->name;
        $post->description = $request->description;
        $post->author = $request->author;
        $post-> save();
        return redirect()->route('post.index');
    }

    public function destroy(string $id):RedirectResponse
    {
        $post = Post::find($id);

        if ($post) {
            $post->delete();
            return redirect()->route('post.index')->with('success', 'Post eliminado exitosamente.');
        } else {
            return redirect()->route('post.index')->with('error', 'No se encontró el post para eliminar.');
        }
    }
}
