<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([

            'admin_name' => 'Vanny Clarita',

            'username' => 'vannyclarita@gmail.com',

            'password' => Hash::make('vanny123'),

            'admin_address' => 'Gianyar',

            'phone' => '0821473960666'

        ]);
    }
}
