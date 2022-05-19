<?php

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 50 ; $i++) { 
            $addPost = new Post();
            $random = rand(1 , 150);
            $addPost->title = ucfirst($faker->unique()->words(rand(1 , 5)), true);
            $addPost->author_name = $faker->name();
            $addPost->content = $faker->paragraphs(rand(1 , 3), true);
            $addPost->image_url = "https://picsum.photos/id/$random/350/500";
            $addPost->slug = Str::slug($addPost->title, "-") ."-". $i + 1;
            $addPost->save();
            
        }
    }
}
