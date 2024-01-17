<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Article;
use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Tag::factory()->count(15)->create();
        Article::factory()->count(10)->create();
        $tags = Tag::all();

        Article::all()->each(function($article) use($tags){
            $article->tags()->attach(
                $tags->random(rand(1,5))->pluck('id')->toArray()
            );
        });

    }
}
