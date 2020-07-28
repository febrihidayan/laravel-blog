<?php

namespace App\Http\Controllers;

use App\Post;
use App\Topic;
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
        $topic = Topic::where('slug', $slug)->firstOrFail();
        $posts = Post::where('topic_id', $topic->id)->paginate();

        return view('card')
            ->withPosts($posts)
            ->withTopic($topic);
    }

    public function single($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        return view('single')->withPost($post);
    }

}
