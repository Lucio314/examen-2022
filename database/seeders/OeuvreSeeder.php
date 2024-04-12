<?php

namespace Database\Seeders;

use App\Models\Oeuvre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OeuvreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Oeuvre::create([
            'nom' => 'Trône d\'apparat du Roi GHEZO',
            'description' => 'azerty',
            'annee' => '2001',
            'idArtiste' => 1,
            'idCategorie' => 1
        ]);
        Oeuvre::create([
            'nom' => 'Ekélodjouoti',
            'description' => 'azerty',
            'annee' => '2001',
            'idArtiste' => 2,
            'idCategorie' => 2
        ]);
    }
}
