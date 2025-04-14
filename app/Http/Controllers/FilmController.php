<?php
namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Genre;
use App\Models\Kategori;
use App\Models\Review;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $kategori = Kategori::all();
        $genre    = Genre::all();

        // Ambil ID kategori dan genre dari request
        $id_kategori = $request->get('id_kategori');
        $id_genre    = $request->get('id_genre');

        // Filter film berdasarkan kategori atau genre jika ada
        if ($id_kategori) {
            $film = Film::where('id_kategori', $id_kategori)->get();
        } elseif ($id_genre) {
            $film = Film::where('id_genre', $id_genre)->get();
        } else {
            // Jika tidak, ambil semua film
            $film = Film::orderBy('created_at', 'desc')->get();
        }

        // Menambahkan formatted_tanggal pada setiap film
        foreach ($film as $data) {
            $data->formatted_tanggal = Carbon::parse($data->tanggal)->translatedFormat('l, d F Y');
        }

        $film = Film::paginate(10);

        return view('film.index', compact('film', 'kategori', 'id_kategori', 'genre', 'id_genre' ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::all();
        $genre    = Genre::all();

        return view('film.create', compact('kategori', 'genre'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul'       => 'required|string|max:255',
            'aktor'       => 'required|string|max:255',
            'sipnosis'    => 'required',
            'tahun_rilis' => 'required',
            'waktu'       => 'required',
            'poster'      => 'required|max:5400|mimes:png,jpg,webp',
            'trailer'     => 'required',
        ]);

        $film              = new Film;
        $film->judul       = $request->judul;
        $film->id_kategori = $request->id_kategori;
        $film->id_genre    = $request->id_genre;
        $film->aktor       = $request->aktor;
        $film->sipnosis    = $request->sipnosis;
        $film->tahun_rilis = $request->tahun_rilis;
        $film->waktu       = $request->waktu;

        if ($request->hasFile('poster')) {
            $img  = $request->file('poster');
            $name = rand(1000, 9999) . $img->getClientOriginalName();
            $img->move('images/film', $name);
            $film->poster = $name;
        }

        $film->trailer = $request->trailer;

        $film->save();
        toast('New entry has been saved', 'success');

        return redirect()->route('film.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function show(Film $film)
    {

        $kategori = Kategori::all();
        $genre    = Genre::all();

        return view('film.show', compact('film', 'kategori', 'genre'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function edit(Film $film)
    {

        $kategori = Kategori::all();
        $genre    = Genre::all();
        return view('film.edit', compact('film', 'kategori', 'genre'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Film $film)
    {
        $validated = $request->validate([
            'judul'       => 'required|string|max:255',
            'aktor'       => 'required|string|max:255',
            'sipnosis'    => 'required',
            'tahun_rilis' => 'required',
            'waktu'       => 'required',
            'poster'      => 'required|max:5400|mimes:png,jpg,webp',
            'trailer'     => 'required',
        ]);

        $film->judul       = $request->judul;
        $film->id_kategori = $request->id_kategori;
        $film->id_genre    = $request->id_genre;
        $film->aktor       = $request->aktor;
        $film->sipnosis    = $request->sipnosis;
        $film->tahun_rilis = $request->tahun_rilis;
        $film->waktu       = $request->waktu;

        if ($request->hasFile('poster')) {
            $img  = $request->file('poster');
            $name = rand(1000, 9999) . $img->getClientOriginalName();
            $img->move('images/film', $name);
            $film->poster = $name;
        }

        $film->trailer = $request->trailer;

        $film->save();
        toast('New entry has been saved', 'success');

        return redirect()->route('film.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function destroy(Film $film)
    {

        $film->delete();

        toast('Record removed successfully', 'success');
        return redirect()->route('film.index');

    }
}
