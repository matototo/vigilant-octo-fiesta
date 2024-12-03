<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;


class CategoryController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title_en' => 'required|max:30',
            'title_fr' => 'max:30',
            'description_en' => 'required|min:30',
            'description_fr' => 'min:30',
        ]);
        $title = [
            'en' => $request->title_en,
        ];
        if($request->title_fr != null) { $title = $title + ['fr' => $request->title_fr];};
        $description = [
            'en' => $request->description_en,
        ];
        if($request->description_fr != null) { $description = $description + ['fr' => $request->description_fr];};
        Category::create([
            'title' => $title,
            'description' => $description,
        ]);
        return back()->withSuccess('Category created successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
