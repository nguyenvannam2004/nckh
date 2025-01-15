<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tours;

class tourController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tour = tours::paginate(6);
        return view('tour.index',compact('tour'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tour.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tour = tours::find($id);
        return view('tour.edit',compact('tour'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tour = tours::findOrFail($id); 
        $tour->delete();  
        return redirect()->route('tour.index')->with('success', 'DELETE SUCSESS');
    }
}
