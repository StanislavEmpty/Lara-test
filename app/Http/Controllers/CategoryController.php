<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Sector;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Db::table('categories')
            ->join('sectors', 'sectors.id', '=', 'categories.sector_id')
            ->select('categories.*', 'sectors.name as sector_name')
            ->orderBy('id')
            ->get();
        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sectors = Sector::all();
        return view('category.create', compact('sectors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|unique:categories|max:255',
            'sector_id' => 'required',
        ]);
        Category::create($data);
        return redirect()->route('category.index')->with('success', 'Category added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = DB::table('categories')
            ->join('sectors', 'sectors.id', '=', 'categories.sector_id')
            ->select('categories.*', 'sectors.name as sector_name')
            ->where('categories.id', $id)
            ->first();
        return view('category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = DB::table('categories')
            ->join('sectors', 'sectors.id', '=', 'categories.sector_id')
            ->select('categories.*', 'sectors.name as sector_name')
            ->where('categories.id', $id)
            ->first();
        $sectors = Sector::all();
        return view('category.edit', compact('category', 'sectors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $data = $request->validate([
            'name' => 'required|unique:categories,name,'.$category->id.'|max:255',
            'sector_id' => 'required',
        ]);
        $category->update($data);
        return redirect()->route('category.index')->with('success', 'Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('category.index')->with('success', 'Category deleted successfully');
    }
}
