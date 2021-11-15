<?php

namespace Database\Seeders;

use App\Models\Training;
use App\Models\User;
use Cassandra\Type\UserType;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserTypeSeeder::class,
            UserSeeder::class,
            CategorySeeder::class,
            TypeSeeder::class,
            TrainingSeeder::class,
            TrainingCategorySeeder::class,
            ChapterSeeder::class,
            TrainingTypeSeeder::class,
            CommentSeeder::class,
        ]);
    }
}
