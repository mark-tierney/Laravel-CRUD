<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BlogPostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $postCount = (int)$this->command->ask('How many blog posts?', 50);

        $users = \App\Models\User::all();
        \App\Models\BlogPost::factory($postCount)->make()->each(function($post) use ($users) {
            $post->user_id = $users->random()->id;
            $post->save();
        });
    }
}
