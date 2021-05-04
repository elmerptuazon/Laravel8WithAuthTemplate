<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            [
                'id'=>'0ed43t5c-1232-22eb-b55f-1c1badsfe211',
                'title' => 'test1',
                'content' => 'test content',
                'author' => 'test',
                'user_id'=>1
            ],
            [
                'id'=>'0ed43t5c-1232-22eb-b55f-1c1badsfe212',
                'title' => 'test2',
                'content' => 'test content',
                'author' => 'test',
                'user_id'=>1
            ],
        ]);
    }
}
