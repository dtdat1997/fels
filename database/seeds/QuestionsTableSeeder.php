<?php

use Illuminate\Database\Seeder;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 500; $i++) { 
        	$qs = factory(App\Question::class)->create();
        	factory(App\Answer::class,4)->create([
                'question_id' => $qs->id,
            ]);
        }
    }
}
