<?php
namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Review;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $film = Film::all();
        $user = User::all();

        // Ambil ID film dari request
        $id_film = $request->get('id_film');
        $id_user = $request->get('id_user');

        if ($id_film) {
            $review = Review::where('id_film', $id_film)->get();
        } elseif ($id_user) {
            $review = Review::where('id_user', $id_user)->get();
        } else {
            // Jika tidak, ambil semua film
            $review = Review::orderBy('created_at', 'desc')->get();
        }

        // Menambahkan formatted_tanggal pada setiap review
        foreach ($review as $data) {
            $data->formatted_tanggal = Carbon::parse($data->created_at)->translatedFormat('l, d F Y');
        }

        return view('review.index', compact('review', 'film', 'id_film', 'user', 'id_user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $film = Film::all();
        $user = User::all();

        return view('review.create', compact('film', 'user'));

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
            'rating'   => 'required|integer|min:1|max:10',
            'komen' => 'required|string',

        ]);

        $review           = new Review;
        $review->id_film  = $request->id_film;
        $review->id_user  = $request->id_user;
        $review->rating   = $request->rating;
        $review->komen = $request->komen;

        $review->save();
        toast('New review has been saved', 'success');

        return redirect()->route('review.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        $film = Film::all();
        $user = User::all();

        return view('review.show', compact('review', 'film', 'user'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        $film = Film::all();
        return view('review.edit', compact('film', 'review'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review)
    {
        $validated = $request->validate([
            'rating'   => 'required|integer|min:1|max:10',
            'komen' => 'required|string',

        ]);

        
        $review->id_film  = $request->id_film;
        $review->id_user  = $request->id_user;
        $review->rating   = $request->rating;
        $review->komen = $request->komen;

        $review->save();
        toast('New review has been saved', 'success');

        return redirect()->route('review.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        $review->delete();
        toast('Review removed successfully', 'success');
        return redirect()->route('review.index');
    }
}
