<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insérer les sujets prédéfinis dans la table subjects
        DB::table('subjects')->insert([
            ['name' => 'Dossier ingénierie'],
            ['name' => 'Dossier exploitation'],
            ['name' => 'Dossier présentation'],
            ['name' => 'Dossier technique'],
        ]);
    }
}
