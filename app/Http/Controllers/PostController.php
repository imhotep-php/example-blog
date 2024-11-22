<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Imhotep\Contracts\Http\Request;
use Imhotep\Facades\Auth;
use Imhotep\Facades\View;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->str('q');

        $posts = empty($q) ? Post::all() : Post::getByQuery($q);

        return View::make('posts.index', [
            'q' => $q,
            'posts' => $posts
        ]);
    }

    public function show(string $slug)
    {
        if (! ($post = Post::getBySlug($slug)) ) {
            return redirect()->route('posts.index');
        }

        return View::make('posts.detail')->withPost($post);
    }

    public function create(Request $request)
    {
        if (Auth::guest()) {
            return redirect()->route('auth.login');
        }

        return View::make('posts.create', [
            'title' => $request->old('title'),
            'text' => $request->old('text'),
        ]);
    }

    public function edit($id)
    {
        if (Auth::guest()) {
            return redirect()->route('posts.index');
        }

        if (! ($post = Post::get((int)$id)) ) {
            return redirect()->route('posts.index');
        }

        if ($post->userId !== Auth::user()->id) {

            return redirect()->route('posts.index');
        }

        return View::make('posts.edit')->withPost($post);
    }

    public function store(Request $request, $id = null)
    {
        if (Auth::guest()) {
            return redirect()->route('posts.index');
        }

        $data = $request->validate([
            'title' => 'required|string|min:4|max:100',
            'text' => 'required|string|min:4|max:10000',
        ]);

        if (! is_numeric($id)) {
            $post = Post::create($data['title'], $data['text']);
        }
        elseif ($post = Post::get((int)$id)){
            $post->title = $data['title'];
            $post->text = $data['text'];

            $post->save();
        }

        return redirect()->route('posts.show', ['slug' => $post->slug]);
    }

    public function remove($id)
    {
        if (Auth::guest()) {
            return redirect()->route('posts.index');
        }

        if ($post = Post::get($id)) {
            if ($post->userId === Auth::user()->id) {
                $post->remove();
            }
        }

        return redirect()->route('posts.index');
    }
}