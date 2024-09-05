<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $courseIDList = [1401393, 1395225, 1401440, 1395456, 1402183, 1423434, 243334, 3434344, 3434344];

        foreach ($courseIDList as $courseID){
            DB::table('courses') -> insert([
                'name' => $faker->name,
                'canvas_course_id' => $courseID,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
