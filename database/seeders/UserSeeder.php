<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $password = '12345678';
        $data = [
            [
                'name' => 'Admin 1',
                'email' => 'admin1@gmail.com',
                'birthday' => '11/01/2001',
                'status' => 1
            ],
            [
                'name' => 'Admin 2',
                'email' => 'admin2@gmail.com',
                'birthday' => '11/01/2001',
                'status' => 0
            ]
        ];
       foreach($data as $item) {
           $user = new User(); 
           $user->name = $item['name'];
           $user->email = $item['email'];
           $user->birthday = $item['birthday'];
           $user->status = $item['status'];
           $user->password = Hash::make($password);
           $user->save();
       }
    }
}
