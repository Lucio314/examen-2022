<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oeuvre extends Model
{
    use HasFactory;
    protected $primaryKey = 'idOeuvre';
    protected $guarded = [];
    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'idCategorie', 'idCategorie');
    }
    public function artiste()
    {
        return $this->belongsTo(Artiste::class, 'idArtiste', 'idArtiste');
    }
}
