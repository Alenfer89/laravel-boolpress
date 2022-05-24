<?php

use App\User;
use App\UserInfo;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class UserInfoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $user_ids = User::pluck('id');

        for ($i=0; $i < count($user_ids) ; $i++) { 
            $info = new UserInfo();

            $info->user_id = $faker->unique()->randomElement($user_ids);
            $info->first_name = $faker->firstName();
            $info->last_name = $faker->lastName();
            $info->profile_pic = $faker->imageUrl(250, 250, 'propic');
            $info->address = $faker->address();
            $info->phone = $faker->phoneNumber();

            $info->save();
        }
    }
}
