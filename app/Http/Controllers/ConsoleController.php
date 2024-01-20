<?php

namespace App\Http\Controllers;

use App\Models\Console;
use Illuminate\Http\Request;

class ConsoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consoles = Console::all();
        return view('console.index', compact('consoles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('console.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string'
        ];

        // Validate the request
        $request->validate($rules);

        // Insert a new record
        Console::create($request->all());

        return redirect()->route('console.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Console  $console
     * @return \Illuminate\Http\Response
     */
    public function edit(Console $console)
    {
        return view('console.edit', compact('console'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Console  $console
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Console $console)
    {
         // Validation rules
         $rules = [
            'name' => 'required|string',
            // Add other validation rules as needed
        ];

        // Validate the request
        $request->validate($rules);

        // Update an existing record
        $console->update($request->all());

        return redirect()->route('console.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Console  $console
     * @return \Illuminate\Http\Response
     */
    public function destroy(Console $console)
    {
        $console->delete();

        return back();
    }
}
