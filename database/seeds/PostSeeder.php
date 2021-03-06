<?php

use App\Post;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 10; $i++) { 
            $newPost = new Post();
            
            $newPost->title = $faker->sentence();
            $newPost->image = $faker->imageUrl(450, 300, 'Posts', true, $newPost->title);
            $newPost->body = $faker->text();
            $newPost->author = $faker->name();
    
            $newPost->save();
        }
    }
}
