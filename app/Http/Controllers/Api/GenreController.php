<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use Illuminate\Http\Request;
use Validator;

class GenreController extends Controller
{
    public function index()
    {
        // Mendapatkan daftar genre terbaru
        $genre = Genre::latest()->get();
        return response()->json([
            'success' => true,
            'message' => 'Daftar Genre',
            'data'    => $genre,
        ], 200);
    }

    public function store(Request $request)
    {
        // Validasi input untuk nama genre
        $validator = Validator::make($request->all(), [
            'nama_genre' => 'required|unique:genres',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors'  => $validator->errors(),
            ], 422);
        }

        try {
            // Membuat genre baru tanpa slug
            $genre = Genre::create([
                'nama_genre' => $request->nama_genre,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Data genre berhasil dibuat',
                'data'    => $genre,
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
            // Menampilkan detail genre berdasarkan ID
            $genre = Genre::findOrFail($id);
            return response()->json([
                'success' => true,
                'message' => 'Detail genre',
                'data'    => $genre,
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
        // Validasi input untuk nama genre
        $validator = Validator::make($request->all(), [
            'nama_genre' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors'  => $validator->errors(),
            ], 422);
        }

        try {
            // Mencari genre berdasarkan ID
            $genre = Genre::findOrFail($id);

            // Update hanya nama_genre
            $genre->nama_genre = $request->nama_genre;
            $genre->save();

            return response()->json([
                'success' => true,
                'message' => 'Data genre berhasil diperbarui',
                'data'    => $genre,
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
            // Mencari genre berdasarkan ID
            $genre = Genre::findOrFail($id);
            $genre->delete();

            return response()->json([
                'success' => true,
                'message' => 'Genre ' . $genre->nama_genre . ' berhasil dihapus',
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
