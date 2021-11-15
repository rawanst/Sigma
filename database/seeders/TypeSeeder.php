<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->insert([
            'label' => 'Initiation'
        ]);
        DB::table('types')->insert([
            'label' => 'Débutant'
        ]);
        DB::table('types')->insert([
            'label' => 'Intermédiaire'
        ]);
        DB::table('types')->insert([
            'label' => 'Avancé'
        ]);
        DB::table('types')->insert([
            'label' => 'Tout les niveaux'
        ]);
    }
}
