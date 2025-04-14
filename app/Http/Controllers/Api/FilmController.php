<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Film;
use Illuminate\Http\Request;
use Validator;

class FilmController extends Controller
{
    public function index()
    {
        // Mendapatkan daftar film terbaru
        $film = Film::latest()->with(['kategori', 'genre'])->get();
        return response()->json([
            'success' => true,
            'message' => 'Daftar Film',
            'data'    => $film,
        ], 200);
    }

    public function store(Request $request)
    {
        // Validasi input untuk film
        $validator = Validator::make($request->all(), [
            'judul'       => 'required|unique:films',
            'id_kategori' => 'required|exists:kategoris,id',
            'id_genre'    => 'required|exists:genres,id',
            'aktor'       => 'required',
            'sinopsis'    => 'required',
            'tahun_rilis' => 'required|integer',
            'waktu'       => 'required|string',
            'poster'      => 'required|url',
            'trailer'     => 'required|url',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors'  => $validator->errors(),
            ], 422);
        }

        try {
            // Membuat film baru
            $film = Film::create([
                'judul'       => $request->judul,
                'id_kategori' => $request->id_kategori,
                'id_genre'    => $request->id_genre,
                'aktor'       => $request->aktor,
                'sinopsis'    => $request->sinopsis,
                'tahun_rilis' => $request->tahun_rilis,
                'waktu'       => $request->waktu,
                'poster'      => $request->poster,
                'trailer'     => $request->trailer,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Data film berhasil dibuat',
                'data'    => $film,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan',
                'errors'  => $e->getMessage(),
            ], 500);
        }
    }

    public function show($id)
    {
        try {
            // Menampilkan detail film berdasarkan ID
            $film = Film::with(['kategori', 'genre'])->findOrFail($id);
            return response()->json([
                'success' => true,
                'message' => 'Detail film',
                'data'    => $film,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan',
                'errors'  => $e->getMessage(),
            ], 404);
        }
    }

    public function update(Request $request, $id)
    {
        // Validasi input untuk film
        $validator = Validator::make($request->all(), [
            'judul'       => 'required',
            'id_kategori' => 'required|exists:kategoris,id',
            'id_genre'    => 'required|exists:genres,id',
            'aktor'       => 'required',
            'sinopsis'    => 'required',
            'tahun_rilis' => 'required|integer',
            'waktu'       => 'required|string',
            'poster'      => 'required|url',
            'trailer'     => 'required|url',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors'  => $validator->errors(),
            ], 422);
        }

        try {
            // Mencari film berdasarkan ID
            $film = Film::findOrFail($id);

            // Update data film
            $film->judul       = $request->judul;
            $film->id_kategori = $request->id_kategori;
            $film->id_genre    = $request->id_genre;
            $film->aktor       = $request->aktor;
            $film->sinopsis    = $request->sinopsis;
            $film->tahun_rilis = $request->tahun_rilis;
            $film->waktu       = $request->waktu;
            $film->poster      = $request->poster;
            $film->trailer     = $request->trailer;
            $film->save();

            return response()->json([
                'success' => true,
                'message' => 'Data film berhasil diperbarui',
                'data'    => $film,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan',
                'errors'  => $e->getMessage(),
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            // Mencari film berdasarkan ID
            $film = Film::findOrFail($id);
            $film->delete();

            return response()->json([
                'success' => true,
                'message' => 'Film ' . $film->judul . ' berhasil dihapus',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan',
                'errors'  => $e->getMessage(),
            ], 404);
        }
    }
}
