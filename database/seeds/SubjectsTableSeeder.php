<?php

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
        DB::table('subjects')->insert([
            ['name_subject' => '7 Core Values', 'question_number' => '30', 'duration' => '30'],
            ['name_subject' => 'Agile Fundamentals	', 'question_number' => '30', 'duration' => '20'],
            ['name_subject' => 'Android', 'question_number' => '30', 'duration' => '20'],
            ['name_subject' => 'Div3_Process', 'question_number' => '30', 'duration' => '20'],
            ['name_subject' => 'Git', 'question_number' => '30', 'duration' => '20'],
            ['name_subject' => 'ISO_en', 'question_number' => '60', 'duration' => '30'],
            ['name_subject' => 'ISO_vi', 'question_number' => '60', 'duration' => '30'],
            ['name_subject' => 'Java Core', 'question_number' => '25', 'duration' => '20'],
            ['name_subject' => 'MySQL', 'question_number' => '30', 'duration' => '20'],
            ['name_subject' => 'MySQL Exercise', 'question_number' => '30', 'duration' => '20'],
            ['name_subject' => 'PHP Basic', 'question_number' => '25', 'duration' => '20'],
            ['name_subject' => 'Ruby', 'question_number' => '30', 'duration' => '20'],
            ['name_subject' => 'Ruby on Rails', 'question_number' => '30', 'duration' => '20'],
        ]);
    }
}
