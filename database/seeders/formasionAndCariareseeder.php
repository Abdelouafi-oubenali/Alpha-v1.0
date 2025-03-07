<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Formation;
use App\Models\Carriere;


class formasionAndCariareseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Formation::create([
            'titre' => 'Formation Laravel',
            'description' => 'Apprendre Laravel en profondeur',
            'date_debut' => now(),
            'date_fin' => now()->addMonths(2),
            'employe_id' => 7
        ]);

        Carriere::create([
            'poste' => 'Développeur Senior',
            'description' => 'Promotion en tant que développeur senior',
            'date_debut' => now(),
            'employe_id' => 7
        ]);

    }
}
