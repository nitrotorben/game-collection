<?php

namespace App\Http\Controllers;

use App\Models\Fsk;
use Illuminate\Http\Request;

class FskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fsks = Fsk::all();
        return view('fsks.index', compact('fsks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fsks.create');
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
        Fsk::create($request->all());

        return redirect()->route('fsk.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fsk  $fsk
     * @return \Illuminate\Http\Response
     */
    public function edit(Fsk $fsk)
    {
        return view('fsks.edit', compact('fsk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fsk  $fsk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fsk $fsk)
    {
         // Validation rules
         $rules = [
            'name' => 'required|string',
            // Add other validation rules as needed
        ];

        // Validate the request
        $request->validate($rules);

        // Update an existing record
        $fsk->update($request->all());

        return redirect()->route('fsk.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fsk  $fsk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fsk $fsk)
    {
        $fsk->delete();

        return back();
    }
}
