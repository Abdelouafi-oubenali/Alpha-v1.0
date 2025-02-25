<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class userseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'abdelouafi',
            'email' => 'abdelouuafioubenali@gmail.com',
            'password' => 'kizaru2004',
            'entreprise_id' => '1'
        ]);
    }
}
