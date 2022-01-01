<?php

namespace Database\Seeders;
use Faker\Factory as Faker;
use App\Models\Craftsman;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Str;
class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $users = DB::table('users')->select('*')->where('role',1)->get();
        foreach(range(1,250) as $st){
            DB::table('comments')->insert([
                'user_id' => $users->random()->id,
                'comment' => $faker -> text(64),
                'craftsman_id' => Craftsman::all()->random()->id,
            ]);
        }
    }
}
