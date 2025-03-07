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
        $admin = User::create([
            'name' => 'abdelouafi',
            'email' => 'abdelouuafioubenali@gmail.com',
            'password' => 'kizaru2004',
            'entreprise_id' => '1',
            'role' => 'Admin'

        ]);
        $admin->assignRole('Admin');

        $Employe = User::create([
            'name' => 'Amina',
            'email' => 'amina@gmail.com',
            'password' => '123456789',
            'role' => 'Employe',
            'entreprise_id' => '1',
        ]);
        $Employe->assignRole('Employe');


        $Manager = User::create([
            'name' => 'ali yara',
            'email' => 'aliyara@gmail.com',
            'password' => '123456789',
            'role' => 'Manager',
            'entreprise_id' => '1',
        ]);
        $Manager->assignRole('Manager');

        $RH = User::create([
            'name' => 'kizaru',
            'email' => 'kizaru@gmail.com',
            'password' => '123456789',
            'role' => 'Manager',
            'entreprise_id' => '1',
        ]);
        $RH->assignRole('RH');
    }
}
