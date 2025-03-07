<?php

namespace Database\Seeders;

use App\Models\Parcours;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class parcoursSeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Parcours::create([
        //     'user_id' => '3',
        //     'titre' => 'stage',
        //     'description' => 'stage de fin d\'étude',
        //     'date_debut' => '2021-06-01',
        //     'date_fin' => '2021-07-01'
        // ]);
        Parcours::create([
            'user_id' => '7',
            'titre' => 'unf',
            'description' => 'stage de fin d\'étude',
            'date_debut' => '2021-06-01',
            'date_fin' => '2021-07-30'
        ]);
        Parcours::create([
            'user_id' => '7',
            'titre' => 'lo2',
            'description' => 'stage de fin d\'étude',
            'date_debut' => '2021-06-01',
            'date_fin' => '2021-07-30'
        ]);
        Parcours::create([
            'user_id' => '3',
            'titre' => 'stage',
            'description' => 'stage de fin d\'étude',
            'date_debut' => '2021-06-01',
            'date_fin' => '2021-07-30'
        ]);

    }
}
