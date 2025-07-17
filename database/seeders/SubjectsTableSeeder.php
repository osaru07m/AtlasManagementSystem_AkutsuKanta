<?php

namespace Database\Seeders;

use App\Models\Users\Subjects;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 国語、数学、英語を追加
        $subjects = ['国語', '数学', '英語'];

        foreach ($subjects as $subject) {
            Subjects::create(['subject' => $subject]);
        }
    }
}
