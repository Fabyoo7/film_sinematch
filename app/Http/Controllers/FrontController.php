<?php
namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $film = Film::all();
        
        return view('layouts.frontend', ['film' => $film]);
    }

    public function show($id)
    {
        $film   = Film::findOrFail($id);
        $review = $film->review()->latest()->get();
        return view('detail', compact('film', 'review'));
    }

    public function profile()
    {
        $film = Film::all();
        return view('profile', compact( 'film'));
    }

     public function about()
    {
        return view('about');
    }

     public function catalog()
    {
        $film = Film::all();
        return view('catalog' ,compact( 'film'));
    }



    public function storeReview(Request $request, $id)
    {
        $request->validate([
            'nama'     => 'required|string|max:255',
            'komentar' => 'required|string',
            'rating'   => 'required|integer|min:1|max:10',
        ]);

        $film = Film::findOrFail($id);
        $film->review()->create([
            'nama'     => $request->nama,
            'komentar' => $request->komentar,
            'rating'   => $request->rating,
            'id_film'  => $film->id,
        ]);

        return redirect()->route('detail', $id)->with('success', 'Komentar berhasil ditambahkan.');
    }
}
