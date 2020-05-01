<?php

namespace App\Http\Controllers\Admin;

use App\Category2;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Category2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.categories.index', [
           'categories' => Category2::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create', [
            'category' => [],
            'categories' => Category2::with('children')->where('parent_id', '0')->get(),
            'delimeter' => ''
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       Category2::create($request->all());

       return redirect()->route('admin.category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category2  $category2
     * @return \Illuminate\Http\Response
     */
    public function show(Category2 $category2)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category2  $category2
     * @return \Illuminate\Http\Response
     */
    public function edit(Category2 $category2)
    {
        return view('admin.categories.edit', [
            'category' => $category2,
            'categories' => Category2::with('children')->where('parent_id', '0')->get(),
            'delimeter' => ''
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category2  $category2
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category2 $category2)
    {
        $category2->update($request->except('slug'));

        return redirect()->route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category2  $category2
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category2 $category2)
    {
        //
    }
}
