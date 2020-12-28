<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    protected $random = array(1,2,3,4,5);

    public function run()
    {
        $tags = Tag::all();
        Post::factory(10)->create();

        // loop all Posts
        Post::all()->each(function ($post) use ($tags) {
            // get return array of $random a random
            $random_tagId = array_rand($this->random, 3);
            // Attach post_id to tag_id
            $post->tags()->attach(
                // Filter of $random_tagId to except 0 because 0 isn't tag_id
                array_diff($random_tagId, array(0))
            );
        });
    }
}
