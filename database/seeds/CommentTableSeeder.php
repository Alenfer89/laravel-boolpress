<?php

use App\Models\Comment;
use App\Models\Post;
use App\User;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $user_ids = User::pluck('id')->toArray();
        $posts = Post::all();

        foreach ($posts as $post) {
            for ($i=0; $i < rand(0 , 10); $i++) { 
                $comment = new Comment();

                $comment->post_id = $post->id;
                $comment->user_id = $faker->randomElement($user_ids);
                $comment->message = $faker->words(rand(3, 20), true);

                $comment->save();
            }
        }
    }
}
