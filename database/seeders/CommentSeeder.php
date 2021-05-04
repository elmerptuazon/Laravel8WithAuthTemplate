<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
            [
                'id'=>'0ed43t5c-1232-22eb-b55f-1c1badsfe219',
                'post_id' => '0ed43t5c-1232-22eb-b55f-1c1badsfe211',
                'content' => 'test content1',
                'author' => 'test'
            ],
            [
                'id'=>'0ed43t5c-1232-22eb-b55f-1c1badsfe218',
                'post_id' => '0ed43t5c-1232-22eb-b55f-1c1badsfe212',
                'content' => 'test content2',
                'author' => 'test'
            ],
            [
                'id'=>'0ed43t5c-1232-22eb-b55f-1c1badsfe217',
                'post_id' => '0ed43t5c-1232-22eb-b55f-1c1badsfe211',
                'content' => 'test content12',
                'author' => 'test'
            ],
            [
                'id'=>'0ed43t5c-1232-22eb-b55f-1c1badsfe216',
                'post_id' => '0ed43t5c-1232-22eb-b55f-1c1badsfe212',
                'content' => 'test content2',
                'author' => 'test'
            ],
        ]);
    }
}
