<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PhoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('phones')->insert([
                'name' => 'Product' . ' ' . $i, 
                'desc' => 'Lorem ispicsum', 
                'price' => rand(100, 999), 
                'image_url' => 'https://picsum.photos/200', 
                'category_id' => rand(1,5),
                'status' => rand(0,1)
            ]);
        }
    }
}
