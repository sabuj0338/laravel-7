<?php

use App\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::insert([
            [
                'role' => 'superadmin',
                'isAdmin' => 1,
                'name' => 'Sabuj Islam',
                'image' => null,
                'phone' => '01775559622',
                'email' => 'sabuj0338@gmail.com',
                'password' => bcrypt('A@superadmin'),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
       ]);
    }
}
