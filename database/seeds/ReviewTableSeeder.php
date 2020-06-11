<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('reviews')->insert([
            "toilet_id" => 6,
            "cleanliness" => "1",
            "accessible" => "4",
            "review" => "Review voor het toilet te Poperinge.",
            "name" => "Bob",
            "created_at" => now(),
        ]);
        DB::table('reviews')->insert([
            "toilet_id" => 6,
            "cleanliness" => "2",
            "accessible" => "4",            "review" => "Review twee voor het toilet te Poperinge.",
            "name" => "Mark",
            "created_at" => now(),
        ]);
        DB::table('reviews')->insert([
            "toilet_id" => 6,
            "cleanliness" => "4",
            "accessible" => "3",
            "review" => "Review drie voor het toilet te Poperinge.",
            "name" => "Jan",
            "created_at" => now(),
        ]);
    }
}
