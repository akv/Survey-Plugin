<?php

use Illuminate\Database\Seeder;

class RatingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $ratings = [
        ['rating_id' => '2', 'created_by' => 'Arun' ], 
        ['rating_id' => '3', 'created_by' => 'Arun' ], 
        ['rating_id' => '4','created_by' => 'Arun'], 
        [ 'rating_id' => '5', 'created_by' => 'Arun' ]
        ];
        
        DB::table('ratings')->insert($ratings);
    }

}
