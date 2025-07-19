<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProblemTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $problemIds = \App\Models\Problem::pluck('id')->toArray();
        $tagIds = \App\Models\Tag::pluck('id')->toArray();

        for ($i = 0; $i < 20; $i++) {
            DB::table('problem_tag')->insert([
                'problem_id' => $problemIds[array_rand($problemIds)],
                'tag_id' => $tagIds[array_rand($tagIds)],
            ]);
        }
    }
}
