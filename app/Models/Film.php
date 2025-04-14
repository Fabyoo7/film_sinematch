<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    protected $fillable = ['judul', 'id_kategori', 'id_genre', 'aktor', 'sipnosis', 'tahun_rilis', 'waktu', 'poster', 'trailer'];
    public $timestamps  = true;

    use HasFactory;

     public function review()
    {
        return $this->hasMany(Review::class, 'id_film'); // Gunakan id_film
    }

    public function kategori()
    {
        return $this->BelongsTo(kategori::class, 'id_kategori');
    }

    public function genre()
    {
        return $this->BelongsTo(genre::class, 'id_genre');
    }

    public function deleteImage()
    {
        if ($this->cover && file_exists(public_path('images/film' . $this->cover))) {
            return unlink(public_path('images/film' . $this->cover));
        }
    }

}
