<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $fillable = ['id', 'nama_kategori'];
    public $timestamps  = true;

    // Relasi ke tabel artikel
    public function film()
    {
        // return $this->hasMany(film::class);
    }

    use HasFactory;

     public function kategori()
    {
        return $this->HasMany(kategori::class, 'id_kategori');
    }
}
