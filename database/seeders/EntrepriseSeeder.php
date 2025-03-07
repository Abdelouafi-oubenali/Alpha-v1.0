<?php

namespace Database\Seeders;

use App\Models\Entreprise;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EntrepriseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Entreprise::create([
            'name' => 'alpha',
            'email' => 'aloha@gmail.com',
            'phone_number' => '0616126869',
            'adresse' => 'kitra siditaibi'
        ]);
    }
}
