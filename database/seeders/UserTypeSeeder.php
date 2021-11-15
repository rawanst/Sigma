<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users_types')->insert([
            'label' => 'Admin'
        ]);
        DB::table('users_types')->insert([
            'label' => 'Premium Trainer'
        ]);
    }
}
