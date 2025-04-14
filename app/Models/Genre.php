<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $fillable = ['id', 'nama_genre'];
    public $timestamps  = true;

    // Relasi ke tabel artikel
    public function film()
    {
        // return $this->hasMany(film::class);
    }

    use HasFactory;
    
    public function genre()
    {
        return $this->HasMany(genre::class, 'id_genre');
    }
}
