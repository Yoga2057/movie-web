<?php

namespace App\Http\Controllers;

use App\Movie;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class navController extends Controller
{
    public function home()
    {
        $totalMovies = Movie::count();
        $totalUsers = User::count();
        $recentMovies = Movie::orderBy('id', 'desc')->take(6)->get();
        $genresCount = DB::table('movie')->select('genre', DB::raw('count(*) as total'))->groupBy('genre')->get();

        return view('home', [
            'key' => 'home',
            'totalMovies' => $totalMovies,
            'totalUsers' => $totalUsers,
            'recentMovies' => $recentMovies,
            'genresCount' => $genresCount
        ]);
    }

    public function movie()
    {
        $mv = Movie::orderBy('id', 'desc')->get();
        return view('movie', ['key' => 'Movie', 'mv' => $mv]);
    }

    public function storeMovie(Request $request)
    {
        $request->validate([
            'imDB' => 'required',
            'title' => 'required|max:50',
            'year' => 'required|digits:4',
            'genre' => 'required|max:50',
            'poster' => 'nullable|max:255',
        ]);

        $poster = $request->poster;
        if (!$poster) {
            $poster = 'https://images.unsplash.com/photo-1489599849927-2ee91cede3ba?auto=format&fit=crop&w=400&q=80';
        }

        Movie::create([
            'imDB' => $request->imDB,
            'title' => $request->title,
            'year' => $request->year,
            'genre' => $request->genre,
            'poster' => $poster,
        ]);

        return redirect('/movie')->with('success', 'Film berhasil ditambahkan!');
    }

    public function deleteMovie($id)
    {
        $movie = Movie::find($id);
        if ($movie) {
            $movie->delete();
        }
        return redirect('/movie')->with('success', 'Film berhasil dihapus!');
    }

    public function kategori()
    {
        $genresCount = DB::table('movie')
            ->select('genre', DB::raw('count(*) as total'))
            ->groupBy('genre')
            ->get();

        return view('kategori', [
            'key' => 'Kategori',
            'genresCount' => $genresCount
        ]);
    }

    public function genre()
    {
        $genres = DB::table('movie')
            ->select('genre', DB::raw('count(*) as total_movie'), DB::raw('MAX(year) as latest_year'))
            ->groupBy('genre')
            ->get();

        return view('genre', [
            'key' => 'genre',
            'genres' => $genres
        ]);
    }
}
