<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Quiz;
use App\Category;
use App\Http\Requests\QuizsRequest;

class QuizsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quizs = Quiz::all();
        return view('admin.content.quizs.view', compact('quizs', 'quizs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.content.quizs.create', compact('categories', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuizsRequest $request)
    {
        $quizs = new Quiz();

        if($request->hasFile('image')) {
            $image = time().rand(1,100). '.' . $request->file('image')->getClientOriginalExtension();
            $quizs->image = $image;
            $request->file('image')->move('upload/quizs/', $image);
        }

        // Thêm trường thuộc tính
        $quizs->title = $request->input('title');
        $quizs->password = $request->input('password');
        $quizs->duration = $request->input('duration');
        $quizs->active = $request->input('active');
        $quizs->categoryID = $request->input('categoryID');

        $quizs->save();

        // Lọc danh sách category
        $categories = Category::all();

        return view('admin.content.quizs.create', compact('categories', 'categories'))->with('success', 'Thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $quiz = Quiz::findOrFail($id);
        return view('admin.content.quizs.show')->with('quiz', $quiz);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $quiz = Quiz::findOrFail($id);
        $categories = Category::all();
        return view('admin.content.quizs.edit', compact('categories', 'categories'))->with('quiz', $quiz);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(QuizsRequest $request, $id)
    {
        $quizs = Quiz::findOrFail($id);

        if($request->hasFile('image')) {
            $image = time().rand(1,100). '.' . $request->file('image')->getClientOriginalExtension();
            $quizs->image = $image;
            $request->file('image')->move('upload/quizs/', $image);
        }

        // Thêm trường thuộc tính
        $quizs->title = $request->input('title');
        $quizs->password = $request->input('password');
        $quizs->duration = $request->input('duration');
        $quizs->active = $request->input('active');
        $quizs->categoryID = $request->input('categoryID');

        $quizs->save();

        // Lọc danh sách quiz
        $quiz = Quiz::findOrFail($id);

        return view('admin.content.quizs.show', compact('quiz', 'quiz'))->with('success', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $quiz = Quiz::findOrFail($id);
        $quiz->delete();
        return redirect('admin/quizs');
    }
}
