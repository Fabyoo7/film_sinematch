<?php
namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Genre;
use App\Models\Kategori;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user           = Auth::user(); // Ambil data user yang login
        $film           = Film::all();
        $review         = Review::all();
        $total_kategori = Kategori::count('id');
        $total_genre    = Genre::count('id');
        $total_film     = Film::count('id');
        $total_review   = Review::count('id');
        return view('home', compact('total_kategori', 'total_genre', 'total_film', 'total_review' , 'film','user','review'));

    }
}
