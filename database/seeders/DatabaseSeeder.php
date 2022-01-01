<?php

namespace Database\Seeders;
//use database\RegionSeeder;
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
        $this->call([
            RegionSeeder::class,
            TradeTypeSeeder::Class,
            PostNumberSeeder::class,
            PriceRangeSeeder::class,
            UserSeeder::class,
            CraftsmanSeeder::class,
            CommentSeeder::class,
            RatingSeeder::class,
        ]);

    }
}
