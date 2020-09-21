<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Topic;

class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 5; $i++) { 
            Topic::create([
                'name' => 'Topic '.$i,
                'slug' => Str::slug('Topic'.$i),
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'
            ]);
        }
    }
}
