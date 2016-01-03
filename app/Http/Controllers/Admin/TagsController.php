<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Tag;
use App\Quiz;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();
        return view('admin.content.tags.view', compact('tags', 'tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $quizs = Quiz::all();
        return view('admin.content.tags.create', compact('quizs', 'quizs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required|max:100|unique:tags,title',
            'quizID' => 'required'
        ]);

        // dd($request->input('quizID'));

        $tag = new Tag();
        $tag->title = $request->input('title');
        $tag->quizID = $request->input('quizID');

        $tag->save();


        $quizs = Quiz::all();

        return view('admin.content.tags.create', compact('quizs','quizs'))->with('success', 'Thêm thành công');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tag = Tag::findOrFail($id);
        return view('admin.content.tags.show', compact('tag', 'tag'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = Tag::findOrFail($id);
        $quizs = Quiz::all();
        return view('admin.content.tags.edit', compact('tag','tag'))->with('quizs', $quizs);
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
        $this->validate($request,[
            'title' => 'required|max:100',
            'quizID' => 'required'
        ]);

        $tag = Tag::findOrFail($id);
        $tag->title = $request->input('title');
        $tag->quizID = $request->input('quizID');
        $tag->save();

        return view('admin.content.tags.show', compact('tag', 'tag'))->with('success', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::findOrFail($id);
        $tag->delete();
        return redirect('admin/tags');
    }
}
