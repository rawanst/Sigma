<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'label' => 'Développement'
        ]);
        DB::table('categories')->insert([
            'label' => 'Finance et comptabilité'
        ]);
        DB::table('categories')->insert([
            'label' => 'Développement personnel'
        ]);
        DB::table('categories')->insert([
            'label' => 'Marketing'
        ]);
        DB::table('categories')->insert([
            'label' => 'Santé et bien-être'
        ]);
        DB::table('categories')->insert([
            'label' => 'Photographie et vidéo'
        ]);
    }
}
