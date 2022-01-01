<?php

namespace Database\Seeders;
use App\Models\Region;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegionSeeder extends Seeder
{
    protected $regions = [
        "osrednjeslovenska",
        "gorenjska",
        "goriška",
        "obalno-kraška",
        "primorsko-notranjska",
        "jugovzhodna Slovenija",
        "posavska",
        "zasavska",
        "savinjska",
        "koroška",
        "podravska",
        "pomurska"
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach($this->regions as $region) {
            Region::query()->firstOrCreate([
                "region" => $region
        ]);
        }   
    }
}
