<?php

namespace Database\Seeders;

use Faker\Core\Number;
use Faker\Provider\ar_JO\Text;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class postsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //



        
        
        DB::table('posts')->insert([
            'title' => Str::random(10),
            'slug' => Str::random(10),
            'content' => Str::random(100),
            'view_count' => random_int(2, 20),
        ]);
    }
}
