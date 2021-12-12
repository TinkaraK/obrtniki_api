<?php

namespace Database\Seeders;

use App\Models\TradeType;
use Illuminate\Database\Seeder;


class TradeTypeSeeder extends Seeder
{

    protected $types = [
        "arhitekti",
        "električarji",
        "gradbeniki",
        "okna, vrata",
        "slikarji",
        "vodovodarji",
        "vrtnarji",
        "mizarji"
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        foreach($this->types as $type) {
            TradeType::query()->firstOrCreate([
                "name" => $type
        ]);
        }

    }
}
