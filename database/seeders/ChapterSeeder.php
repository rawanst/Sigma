<?php

namespace Database\Seeders;

use App\Models\Chapter;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ChapterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 12; $i++) {
            DB::table('chapters')->insert([
                'title' => Str::random(10),
                'description' => Str::random(30),
                'number_of_chapter' => 1,
                'training' => $i,
            ]);
        }
    }
}
