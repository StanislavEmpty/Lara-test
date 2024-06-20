<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Sector;
use Illuminate\Http\Request;

class SectorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sectors = Sector::all();
//        dd($sectors);
        return view('sector.index', compact('sectors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sector.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|unique:sectors|max:255',
        ]);
        Sector::create($data);
        return redirect()->route('sector.index')->with('success', 'Sector added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sector $sector)
    {
        return view('sector.show', compact('sector'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sector $sector)
    {
        return view('sector.edit', compact('sector'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sector $sector)
    {
        $data = $request->validate([
            'name' => 'required|unique:sectors,name,'.$sector->id.'|max:255',
        ]);
        $sector->update($data);
        return redirect()->route('sector.index')->with('success', 'Sector updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sector $sector)
    {
        $sector->delete();
        return redirect()->route('sector.index')->with('success', 'Sector deleted successfully');
    }
}
