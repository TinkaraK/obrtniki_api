<?php

namespace Database\Seeders;
use App\Models\Price_range;
use Illuminate\Database\Seeder;

class PriceRangeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    protected $ranges = [
        "nizkocenovno",
        "normalno",
        "visokocenovno"
    ];
    public function run()
    {
        foreach($this->ranges as $range) {
            Price_range::query()->firstOrCreate([
                "range" => $range
        ]);
        } 
    }
}
