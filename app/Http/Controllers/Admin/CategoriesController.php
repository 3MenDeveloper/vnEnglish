<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoriesRequest;
use App\Category;
use File;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.content.categories.view', compact('categories','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.content.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoriesRequest $request)
    {
        $categories = new Category();

        if($request->hasFile('image')) {
            $image = time().rand(1,100). '.' . $request->file('image')->getClientOriginalExtension();
            $categories->image = $image;
            $request->file('image')->move('upload/categories/', $image);
        }
        $categories->title = $request->input('title');
        $categories->exp = $request->input('exp');

        $categories->save();

        return view('admin.content.categories.create')->with('success', 'Thêm Thành Công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.content.categories.show', compact('category','category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($categoryID)
    {
        $category = Category::findOrfail($categoryID);
        return view('admin.content.categories.edit', compact('category','category' ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoriesRequest $request, $id)
    {
        $category = Category::findOrFail($id);

        if($request->hasFile('image')) {
            if(file_exists('upload/'.$category->image))
                File::delete('upload/'.$category->image);
            $image = time().rand(1,100). '.' . $request->file('image')->getClientOriginalExtension();
            $category->image   = $image;
            $request->file('image')->move('upload/categories/', $image);
        }
        $category->title = $request->input('title');
        $category->exp = $request->input('exp');

        $category->save();

        return view('admin.content.categories.show', compact('category', 'category'))->with('success', 'Cập Nhật Thành Công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect('admin/categories');
    }
}
