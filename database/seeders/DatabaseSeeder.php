<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('sandi')
        ]);

        /*  Post::create([
            'title' => 'Post 1',
            'user_id' => '1',
            'slug' => 'post-1',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam recusandae quas in, odio sequi cumque sit aut esse architecto soluta repellendus ab libero ipsa debitis est? Unde sequi illum provident! Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore exercitationem eius omnis, perspiciatis autem sapiente ipsam expedita? Dolorum, ut quae. Voluptatum veritatis tenetur suscipit quisquam voluptate magni magnam repudiandae nobis! Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium voluptatibus adipisci non accusamus hic enim, blanditiis in amet dolores sint consequatur a voluptatum repellat, vel vero tempora repellendus eos eligendi?'
        ]);

        Post::create([
            'title' => 'Post 2',
            'user_id' => '1',
            'slug' => 'post-2',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam recusandae quas in, odio sequi cumque sit aut esse architecto soluta repellendus ab libero ipsa debitis est? Unde sequi illum provident! Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore exercitationem eius omnis, perspiciatis autem sapiente ipsam expedita? Dolorum, ut quae. Voluptatum veritatis tenetur suscipit quisquam voluptate magni magnam repudiandae nobis! Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium voluptatibus adipisci non accusamus hic enim, blanditiis in amet dolores sint consequatur a voluptatum repellat, vel vero tempora repellendus eos eligendi?'
        ]);

        Post::create([
            'title' => 'Post 3',
            'slug' => 'post-3',
            'user_id' => '1',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam recusandae quas in, odio sequi cumque sit aut esse architecto soluta repellendus ab libero ipsa debitis est? Unde sequi illum provident! Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore exercitationem eius omnis, perspiciatis autem sapiente ipsam expedita? Dolorum, ut quae. Voluptatum veritatis tenetur suscipit quisquam voluptate magni magnam repudiandae nobis! Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium voluptatibus adipisci non accusamus hic enim, blanditiis in amet dolores sint consequatur a voluptatum repellat, vel vero tempora repellendus eos eligendi?'
        ]); */
    }
}
