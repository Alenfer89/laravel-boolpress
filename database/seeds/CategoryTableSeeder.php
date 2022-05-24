<?php

use App\Models\Category;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $categories = [
            'fun',
            'free time',
            'special',
            'sport',
            'family',
            'food',
            'politics',
            'enviroment',
            'social life',
            'night life',
            'gino spadaccino'
        ];
        for ($i=0; $i < count($categories) ; $i++) {
            
            $addCategory = new Category();

            $addCategory->name = $categories[$i];
            $addCategory->color = $faker->unique()->hexColor();

            $addCategory->save();
        }
        
    }
}
