<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Str;
use Faker\Factory as Faker;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::query()->firstOrCreate([
            'first_name' => "Tinkara",
            'last_name' => "Koncan",
            'role' => 1,
            'email' => "tinkara.koncan@gmail.com",
            "password" => Hash::make("geslo123"),
        ]);

        User::query()->firstOrCreate([
            'first_name' => "Janez",
            'last_name' => "Novak",
            'role' => 2,
            'email' => "janez@gmail.com",
            "password" => Hash::make("geslo12p3")
        ]);

        $faker = Faker::create();
        foreach(range(1,100) as $st){
            DB::table('users')->insert([
                'first_name' => $faker ->name,
                'last_name' => $faker ->lastName,
                'role' => $faker ->numberBetween($min = 1, $max = 2),
                'email' => $faker ->email,
                "password" => $faker ->password
            ]);
        }

    }
}
