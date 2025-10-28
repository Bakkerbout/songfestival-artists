<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Country;
use http\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function Laravel\Prompts\error;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Artist::where('status', true);

        if ($request->filled('year')) {
            $query->where('year', $request->year);
        }

        if ($request->filled('country')) {
            $query->where('country_id', $request->country);
        }

        if ($request->filled('final_position')) {
            $query->where('final_position', $request->final_position);
        }
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('song', 'like', "%{$search}%");
            });
        }

        $artists = $query->get();
        $countries = Country::all();
        $years = Artist::select('year')->distinct()->orderBy('year')->pluck('year');
        $finalPositions = range(1, 50);

        return view('artists.index', compact('artists', 'years', 'countries', 'finalPositions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = Country::all();
        return view('artists.create', compact('countries'));
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
            'country_id' => ['required', 'exists:countries,id'],
            'image' => ['required', 'image'],
            'status' => ['nullable'],
        ]);
        $artist = new Artist();
        $artist->name = $request->input('name');
        $artist->song = $request->input('song');
        $artist->final_position = $request->input('final_position');
        $artist->year = $request->input('year');
        $artist->country_id = $request->input('country_id');
        $artist->status = $request->input('status', 1); // ✅ standaard 1
        $artist->user_id = Auth::id();

        $nameOfFile = $request->file('image')->storePublicly('folder-name', 'public');
        $artist->image = $nameOfFile;

        $artist->save();
        return redirect()->route('artists.index')->with('success', 'Artist added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $artist = Artist::where('id', $id)->where('status', true)->firstOrFail();

        return view('artists.show', compact('artist'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $artist = Artist::where('id', $id)->where('status', true)->firstOrFail();

        $countries = Country::all();
        return view('artists.edit', compact('artist', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Artist $artist)
    {
        $request->validate([

            'name' => ['required', 'string'],
            'song' => ['required', 'string'],
            'final_position' => ['required', 'integer', 'min:1', 'max:50'],
            'year' => ['required', 'integer', 'min:1956', 'max:2026'],
            'country_id' => ['required', 'exists:countries,id'],
            'image' => ['nullable', 'image'],
        ]);

        $data = $request->only(['name', 'song', 'final_position', 'year', 'country_id']);

        if ($request->hasFile('image')) {
            if ($artist->image && \Storage::disk('public')->exists($artist->image)) {
                \Storage::disk('public')->delete($artist->image);
            }

            $data['image'] = $request->file('image')->store('artists', 'public');
        }
        $artist->update($data);

        return redirect()->route('artists.index')->with('success', 'Artist updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $artist = Artist::findOrFail($id);

        if ($artist->image && \Storage::disk('public')->exists($artist->image)) {
            \Storage::disk('public')->delete($artist->image);
        }

        $artist->delete();

        return redirect()->route('artists.index')->with('success', 'Artist deleted successfully.');
    }


    public function toggleStatus(Artist $artist)
    {
        $artist->status = $artist->status == 1 ? 0 : 1;
        $artist->save();

        return redirect()->back()->with('success', 'Artist status updated!');
    }

}
