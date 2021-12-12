<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

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
            "password" => "geslo123"
        ]);

        User::query()->firstOrCreate([
            'first_name' => "Janez",
            'last_name' => "Novak",
            'role' => 2,
            'email' => "janez@gmail.com",
            "password" => "geslo12p3"
        ]);

    }
}
