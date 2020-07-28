<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;
use App\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = new Post();
        if (auth()->user()->role !== 'admin') {
            $posts->where('user_id', auth()->id());
        }
        return view('manage.posts.index')->withPosts($posts->paginate());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $topics = Topic::all();
        $tags = Tag::all();
        return view('manage.posts.create')
            ->withTopics($topics)
            ->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valid = [
            'title' => 'required|min:3|max:191',
            'content' => 'required|min:3',
        ];

        if (!empty($request->excerpt)) {
            $valid['excerpt'] = 'required|min:3|max:160';
        }

        if (!empty($request->topic)) {
            $valid['topic'] = 'required';
            $request->merge(['topic_id' => $request->topic]);
        }
        
        if (!empty($request->tag)) {
            $valid['tag'] = 'required';
        }
        
        $request->validate($valid);
        
        $slug = Str::slug($request->title);
        
        $slug = Post::where('slug', $slug)->exists() ? "{$slug}-" . Str::random(6) : $slug;

        $request->merge(['slug' => $slug]);

        $request->merge(['user_id' => auth()->id()]);

        $post = Post::create($request->all());

        if (!empty($request->tag)) {
            $post->tags()->sync(explode(',', $request->tag));
        }


        return redirect()->route('manage.posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        $tags = implode(', ', $post->tags->pluck('name')->toArray());

        return view('manage.posts.show')
            ->withPost($post)
            ->withTags($tags);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $topics = Topic::all();
        $tags = Tag::all();

        $topic = $post->topics ? $post->topics : '';

        $tag = $post->tags ? $post->tags : '';

        return view('manage.posts.edit')
            ->withPost($post)
            ->withTopics($topics)
            ->withTopic($topic)
            ->withTags($tags)
            ->withTag($tag);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $valid = [
            'title' => 'required|min:3|max:191',
            'content' => 'required|min:3',
        ];

        if (!empty($request->excerpt)) {
            $valid['excerpt'] = 'required|min:3|max:160';
        }

        if (!empty($request->topic)) {
            $valid['topic'] = 'required';
            $request->merge(['topic_id' => $request->topic]);
        }

        if (!empty($request->tag)) {
            $valid['tag'] = 'required';
        }

        $request->validate($valid);

        $post = Post::findOrFail($id);
        $post->update($request->all());

        $post->tags()->sync(explode(',', $request->tag));

        return redirect()->route('manage.posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('manage.posts.index');
    }
}
