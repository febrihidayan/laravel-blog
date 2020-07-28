<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('index');
    }

    public function topic($slug)
    {
        $posts = Post::whereHas('topics', function($q) use ($slug) {
            $q->where('slug', $slug);
        })->paginate();

        return view('card')->withPosts($posts);
    }

    public function single($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        return view('single')->withPost($post);
    }

}
