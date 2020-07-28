<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;
use App\Topic;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected function index()
    {
        return redirect()->route('manage.dashboard');
    }

    protected function dashboard()
    {
        if (auth()->user()->role == 'admin') {
            $tile = [
                'tags' => Tag::all()->count(),
                'topics' => Topic::all()->count(),
                'posts' => Post::all()->count(),
                'users' => User::all()->count(),
            ];

            $posts = Post::limit(5)->latest()->get();
            $users = User::limit(5)->latest()->get();

            return view('manage.dashboard')
                ->withTile($tile)
                ->withPosts($posts)
                ->withUsers($users);
        }

        return redirect()->route('manane.posts.index');
    }
}
