<?php

namespace Database\Seeders;

use App\Models\Tag;
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
        $tags = collect(['code', 'error', 'bug', 'job', 'design']);
        $tags->each(function($c) {
            Tag::create([
                'name' => $c
            ]);
        });
    }
}
