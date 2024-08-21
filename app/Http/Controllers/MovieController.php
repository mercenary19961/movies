<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Category;
use App\Models\Artist;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index(Request $request)
    {
        $query = Movie::with('category', 'artists');
    
        if ($request->has('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }
    
        if ($request->has('category_id') && $request->category_id != '') {
            $query->where('category_id', $request->category_id);
        }
    
        $movies = $query->get();
        $categories = Category::all();
    
        return view('movies.index', compact('movies', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        $artists = Artist::all();
        return view('movies.create', compact('categories', 'artists'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'release_date' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'required|exists:categories,id',
            'artists' => 'required|array',
            'artists.*' => 'exists:artists,id',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/movies'), $imageName);
            $data['image'] = 'images/movies/' . $imageName;
        }

        $movie = Movie::create($data);
        $movie->artists()->sync($request->artists);

        return redirect()->route('movies.index')->with('success', 'Movie created successfully.');
    }

    public function show(Movie $movie)
    {
        return view('movies.show', compact('movie'));
    }

    public function edit(Movie $movie)
    {
        $categories = Category::all();
        $artists = Artist::all();
        return view('movies.edit', compact('movie', 'categories', 'artists'));
    }

    public function update(Request $request, Movie $movie)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'release_date' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'required|exists:categories,id',
            'artists' => 'required|array',
            'artists.*' => 'exists:artists,id',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            if ($movie->image && file_exists(public_path($movie->image))) {
                unlink(public_path($movie->image));
            }

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/movies'), $imageName);
            $data['image'] = 'images/movies/' . $imageName;
        }

        $movie->update($data);
        $movie->artists()->sync($request->artists);

        return redirect()->route('movies.index')->with('success', 'Movie updated successfully.');
    }

    public function destroy(Movie $movie)
    {
        if ($movie->image && file_exists(public_path($movie->image))) {
            unlink(public_path($movie->image));
        }

        $movie->delete();

        return redirect()->route('movies.index')->with('success', 'Movie deleted successfully.');
    }
}
