<?php

namespace Database\Seeders;

use App\Models\Artiste;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArtisteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Artiste::create([
            'nom' => 'TOKOUDAGBA',
            'prenom' => 'Cyprien ',
            'telephone' => '123-135-123'
        ]);
        Artiste::create([
            'nom' => 'PEDE',
            'prenom' => 'Appolinaire ',
            'telephone' => '123-135-123'
        ]);

    }
}
