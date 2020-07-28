<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topics = Topic::paginate();
        return view('manage.topics.index')->withTopics($topics);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manage.topics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:191',
            'slug' => 'required|min:3|max:191|regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/|unique:topics',
        ]);

        $tag = Topic::create($request->all());

        return redirect()->route('manage.topics.show', $tag->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tag = Topic::findOrFail($id);
        return view('manage.topics.show')->withTopic($tag);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = Topic::findOrFail($id);
        return view('manage.topics.edit')->withTopic($tag);
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
        $request->validate([
            'name' => 'required|min:3|max:191',
            'slug' => 'required|min:3|max:191|regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/|unique:topics,slug,' . $id,
        ]);
        
        if (empty($request->menu)) {
            $request->merge(['menu' => null]);
        }

        $tag = Topic::findOrFail($id);
        $tag->update($request->all());

        return redirect()->route('manage.topics.show', $tag->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Topic::findOrFail($id);
        $tag->delete();

        return redirect()->route('manage.topics.index');
    }
}
