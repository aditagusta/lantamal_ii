<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                "username" => "pusat",
                "password" => Hash::make('123'),
                "password1" => "123",
                "nama_admin" => "Lorem Pusat",
            ]
        ];
        DB::table('tbl_admin')->insert($data);
    }
}
