<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Country;
use http\Message;
use Illuminate\Http\Request;
use function Laravel\Prompts\error;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $artists = Artist::all();
        return view('artists.index', compact('artists'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = Country::all();
        return view('artists.create', compact('countries'));
//        return view('artists.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'song' => ['required', 'string'],
            'final_position' => ['required', 'integer', 'min:1', 'max:50'],
            'year' => ['required', 'integer', 'min:1956', 'max:2026'],
            'country_id' => ['required', 'exists:countries,id']
        ]);
        $artist = new Artist();
        $artist->name = $request->input('name');
        $artist->song = $request->input('song');
        $artist->final_position = $request->input('final_position');
        $artist->year = $request->input('year');
        $artist->country_id = $request->input('country_id');

        $artist->save();
        return redirect()->route('artists.index')->with('success', 'Artist added');

    }

    /**
     * Display the specified resource.
     */
    public function show(Artist $artist)
    {
        return view('artists.show', compact('artist'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Artist $artist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Artist $artist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
