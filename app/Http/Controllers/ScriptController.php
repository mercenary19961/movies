<?php

namespace App\Http\Controllers;

use App\Models\Script;
use App\Models\Artist;
use Illuminate\Http\Request;

class ScriptController extends Controller
{
    public function index()
    {
        $scripts = Script::all();
        return view('scripts.index', compact('scripts'));
    }

    public function create()
    {
        // Fetch artists who don't have a script assigned to them
        $availableArtists = Artist::doesntHave('script')->get();
        return view('scripts.create', compact('availableArtists'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'artist_id' => 'required|exists:artists,id',
        ]);

        Script::create($request->all());

        return redirect()->route('scripts.index');
    }

    public function show(Script $script)
    {
        return view('scripts.show', compact('script'));
    }

    public function edit(Script $script)
    {
        // Fetch artists who don't have a script assigned to them or the one associated with the current script
        $availableArtists = Artist::whereDoesntHave('script')
            ->orWhere('id', $script->artist_id)
            ->get();

        return view('scripts.edit', compact('script', 'availableArtists'));
    }

    public function update(Request $request, Script $script)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'artist_id' => 'required|exists:artists,id',
        ]);

        $script->update($request->all());

        return redirect()->route('scripts.index');
    }

    public function destroy(Script $script)
    {
        $script->delete();
        return redirect()->route('scripts.index');
    }
}
