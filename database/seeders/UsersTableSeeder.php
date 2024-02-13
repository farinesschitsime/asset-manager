<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            "fname"=>"Default",
            'sname'=>"User",
            'email'=>"admin@assets.com",
            'role'=>"admin",
            'password'=>bcrypt("12345678")
        ];

        User::create($data);
    }
}
