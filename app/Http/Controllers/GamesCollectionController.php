<?php

namespace App\Http\Controllers;

use App\Models\Console;
use App\Models\Developer;
use App\Models\Fsk;
use App\Models\GamesCollection;
use App\Models\Language;
use App\Models\Publisher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class GamesCollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $games_collections = GamesCollection::all();
        return view('games_collection.index', compact('games_collections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $consoles = Console::all();
        $publishers = Publisher::all();
        $developers = Developer::all();
        $languages = Language::all();
        $fsks = Fsk::all();
        return view('games_collection.create', compact('consoles', 'publishers', 'developers', 'languages', 'fsks'));
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
            'name' => 'required|string',
            'console_id' => 'required|integer',
            'copies' => 'required|integer|min:1',
            'publisher_id' => 'required|integer',
            'developer_id' => 'required|integer',
            'language_id' => 'required|integer',
            'fsk_id' => 'required|string',
            'year' => 'required|integer',
            'cover' => 'image',
        ];

        // Validate the request
        $request->validate($rules);

        if ($request->hasFile('cover')) {
            // Ensure 'cover' directory exists in the public disk
            $directory = 'cover';
            $path = public_path($directory);

            if (!File::exists($path)) {
                // Create the 'cover' directory with permissions 777
                File::makeDirectory($path, 0777, true, true);
            }

            // Store the file in the 'cover' directory
            $file = $request->file('cover');

            // Generate a unique filename
            $filename = uniqid() . '_' . $file->getClientOriginalName();

            // Move the file to the 'cover' directory
            $file->move($path, $filename);
        }
        // Insert a new record
        GamesCollection::create([
            'name' => $request->name,
            'console_id' => $request->console_id,
            'copies' => $request->copies,
            'publisher_id' => $request->publisher_id,
            'developer_id' => $request->developer_id,
            'language_id' => $request->language_id,
            'fsk_id' => $request->fsk_id,
            'year' => $request->year,
            'cover' => isset($filename) ? $filename : null,
        ]);

        return redirect()->route('games-collection.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GamesCollection  $games_collection
     * @return \Illuminate\Http\Response
     */
    public function edit(GamesCollection $games_collection)
    {
        $consoles = Console::all();
        $publishers = Publisher::all();
        $developers = Developer::all();
        $languages = Language::all();
        $fsks = Fsk::all();
        return view('games_collection.edit', compact('games_collection', 'consoles', 'publishers', 'developers', 'languages', 'fsks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GamesCollection  $games_collection
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GamesCollection $games_collection)
    {
        $rules = [
            'name' => 'required|string',
            'console_id' => 'required|integer',
            'copies' => 'required|integer|min:1',
            'publisher_id' => 'required|integer',
            'developer_id' => 'required|integer',
            'language_id' => 'required|integer',
            'fsk_id' => 'required|string',
            'year' => 'required|integer',
            'cover' => 'image',
        ];

        // Validate the request
        $request->validate($rules);

        if ($request->hasFile('cover')) {

            // delete the old cover image
            if ($games_collection->cover) {
                $filePath = public_path('cover/' . $games_collection->cover);
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }
            // delete the old cover image ends

            // Ensure 'cover' directory exists in the public disk
            $directory = 'cover';
            $path = public_path($directory);

            if (!File::exists($path)) {
                // Create the 'cover' directory with permissions 777
                File::makeDirectory($path, 0777, true, true);
            }

            // Store the file in the 'cover' directory
            $file = $request->file('cover');

            // Generate a unique filename
            $filename = uniqid() . '_' . $file->getClientOriginalName();

            // Move the file to the 'cover' directory
            $file->move($path, $filename);
        } else {
            $filename = $games_collection->cover;
        }

        // Insert a new record
        GamesCollection::where('id', $games_collection->id)->update([
            'name' => $request->name,
            'console_id' => $request->console_id,
            'copies' => $request->copies,
            'publisher_id' => $request->publisher_id,
            'developer_id' => $request->developer_id,
            'language_id' => $request->language_id,
            'fsk_id' => $request->fsk_id,
            'year' => $request->year,
            'cover' => $filename,
        ]);

        return redirect()->route('games-collection.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GamesCollection  $games_collection
     * @return \Illuminate\Http\Response
     */
    public function destroy(GamesCollection $games_collection)
    {
        $filePath = public_path('cover/' . $games_collection->cover);

        // Check if the file exists before attempting to delete
        if (file_exists($filePath)) {
            // Delete the file
            unlink($filePath);
        }
        $games_collection->delete();

        return back();
    }
}
