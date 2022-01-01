<?php

namespace Database\Seeders;
use Faker\Factory as Faker;
use App\Models\Craftsman;
use App\Models\Trade_type;
use App\Models\Post_number;
use App\Models\Region;
use App\Models\Price_range;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Str;

class CraftsmanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $users = DB::table('users')->select('*')->where('role',2)->get();
        $pst = DB::table('post_numbers')->get('id');
        foreach($users as $us){
            DB::table('craftsmen')->insert([
                'id' => $us->id,
                'company_name' => $faker -> company,
                'address' => $faker ->address,
                'post_number' => Post_number::all()->random()->id,
                'phone_number' => $faker ->phoneNumber,
                'tax_number' => $faker -> numerify('########'),
                'trade_type' => $faker ->numberBetween(1, Trade_type::count()),
                'service_describtion' => $faker ->text,
                'company_description' => $faker ->text,
                'region' => $faker ->numberBetween(1, Region::count()),
                'price_range' => $faker ->numberBetween(1, Price_range::count())
            ]);
        }
    }
}