<?php
namespace App\Http\Controllers;

use App\Models\genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $genre = genre::all();
        $genre = genre::orderBy('id', 'desc')->get();
        return view('genre.index', compact('genre'));

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('genre.create');
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
            'nama_genre' => 'required|string|max:255|unique:genres',
        ],

            [
                'nama_genre.required' => 'Nama genre harus diisi',
                'nama_genre.unique'   => 'genre
             dengan Nama genre tersebut sudah ada sebelumnya.',
            ]

        );

        $genre = new genre;
        $genre->nama_genre = $request->nama_genre;
        $genre->save();
        toast('Isi Data Berhasil', 'success');
        return redirect()->route('genre.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\genre
     *  $genre
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $genre = genre::FindOrFail($id);
        return view('genre.show', compact('genre'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\genre
     *  $genre
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $genre = genre
    ::FindOrFail($id);
        return view('genre.edit', compact('genre'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\genre
     *  $genre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $genre = genre ::FindOrFail($id);
        $genre->nama_genre = $request->nama_genre;
        $genre->save();

        toast(' Update Data Berhasil', 'success');
        return redirect()->route('genre.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\genre
     *  $genre
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $genre = genre::FindOrFail($id);
        $genre->delete();
        toast('Hapus Data Berhasil', 'success');
        return redirect()->route('genre.index');

    }
}
