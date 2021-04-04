<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = [
            [
                'user_id' => 1,
                'comment' => 'こんにちは！管理者です。',
            ],
            [
                'user_id' => 1,
                'comment' => 'こんばんは！管理者です。',
            ],
            [
                'user_id' => 1,
                'comment' => 'おはようございます！管理者です。',
            ],
            [
                'user_id' => 2,
                'comment' => 'こんにちは。',
            ],
            [
                'user_id' => 2,
                'comment' => 'こんばんは。',
            ],
            [
                'user_id' => 2,
                'comment' => 'おはようございます！',
            ],
        ];
        
        foreach($posts as $post){
            \App\Post::create($post);
        }
    }
}
