<?php

use App\Tag;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = ['HTML', 'CSS', 'Bootstrap', 'Sass', 'Vue', 'Laravel'];
        foreach($tags as $tag){
            $new_tag = new Tag();

            $new_tag -> name = $tag;
            $new_tag -> slug = Str::slug($tag);
            
            $new_tag -> save();

        }
    }
}
