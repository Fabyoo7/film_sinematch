<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
      protected $fillable = [ 'id_film','id_user', 'rating' , 'komen' ];
     public $timestamps = true;

    use HasFactory;

     public function film()
    {
        return $this->BelongsTo(film::class, 'id_film');
    }

     public function user()
    {
        return $this->BelongsTo(user::class, 'id_user');
    }
}
