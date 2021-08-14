<?php

namespace Database\Seeders;

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

        for ($i=0; $i < 100000; $i++) {
            
            $this -> call ([
                postsSeeder::class,
                tagsSeeder::class,
                categoriesSeeder::class,
        ]) ;
        }
        
        // \App\Models\User::factory(10)->create();
       
    }
}
