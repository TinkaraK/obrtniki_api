<?php

namespace Database\Seeders;
use App\Models\Trade_type;
use Illuminate\Database\Seeder;

class TradeTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    protected $types = [
        "arhitekti",
        "električarji",
        "gradbeniki",
        "okna, vrata",
        "pleskarji",
        "vodovodarji",
        "vrtnarji",
        "mizarji",
		"varnost",
		"ogrevanje/hlajenje"
    ];
    public function run()
    {
        foreach($this->types as $type) {
            Trade_type::query()->firstOrCreate([
                "type" => $type
        ]);
        }
    }
}
