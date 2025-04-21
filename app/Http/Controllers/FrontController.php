<?php
namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Review;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $film = Film::orderBy('created_at', 'desc')->get();
        return view('layouts.frontend', ['film' => $film]);
    }

    public function show($id)
    {
        $film   = Film::findOrFail($id);
        $review = $film->review()->latest()->get();

        $film_utama   = Film::with(['kategori', 'genre'])->findOrFail($id);
        $film_lainnya = Film::with(['kategori', 'genre'])->where('id', '!=', $id)->get();

        return view('detail', compact('film', 'review', 'film_utama', 'film_lainnya'));
    }

    public function profile()
    {
        $film   = Film::all();
        $review = Review::all();
        return view('profile', compact('film', 'review'));
    }

    public function about()
    {
        return view('about');
    }
    public function contact()
    {
        return view('contact');
    }

    public function privacy()
    {
        return view('privacy');
    }

    public function catalog(Request $request)
    {
        $film = Film::orderBy('created_at', 'desc')->get();
        return view('catalog', compact('film'));
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

    public function search(Request $request)
    {
        $query = $request->input('q');

        if (empty($query)) {
            return redirect('catalog'); // atau ke halaman awal
        }

        $film = Film::where('judul', 'like', "%$query%")
            ->orWhereHas('kategori', function ($q) use ($query) {
                $q->where('nama_kategori', 'like', "%$query%");
            })
            ->orWhereHas('genre', function ($q) use ($query) {
                $q->where('nama_genre', 'like', "%$query%");
            })
            ->get();

        return view('catalog', compact('film', 'query'));
    }
}
