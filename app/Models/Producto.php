<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'descripcion', 'precio', 'imagen', 'categoria', 'user_id'];

    // Relación con el usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}