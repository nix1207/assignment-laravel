<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
       for($i = 1 ; $i < 5; $i++) {
        DB::table('categories')->insert([
            'name' => 'Danh muc' . ' ' . $i, 
            'status' => rand(0,1), 
            'desc' => 'Lorem ispicsum', 
            'parent_id' => 0
        ]);
       }
        
    }
}
