<?php

namespace App\Http\Controllers;

use App\Models\Film;

class FavoriteController extends Controller
{
    public function toggle(Film $film)
    {
        $user = auth()->user();

        if ($user->favorites()->where('film_id', $film->id)->exists()) {
            $user->favorites()->detach($film);
            $status = 'removed';
            $message = 'Film berhasil dihapus dari favorit.';
        } else {
            $user->favorites()->attach($film);
            $status = 'added';
            $message = 'Film berhasil ditambahkan ke favorit.';
        }

        return response()->json([
            'status' => $status,
            'message' => $message,
        ]);
    }
}
