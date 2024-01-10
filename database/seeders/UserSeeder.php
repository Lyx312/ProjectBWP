<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usersData = [
            [
                "username" => "bobi",
                "password" => "123",
                "display_name" => "Bobi Hermawan",
                "email" => "bobi@mail.com",
                "phone_number" => "081145125683",
                "address" => "Jalan Jawa No.1",
                "role" => 0
            ],
            [
                "username" => "andi",
                "password" => "111",
                "display_name" => "Andi Kusuma",
                "email" => "andi@mail.com",
                "phone_number" => "083314512356",
                "address" => "Jalan Supratman VII No.53",
                "role" => 0
            ],
            [
                "username" => "suti",
                "password" => "369",
                "display_name" => "Suti Susanti",
                "email" => "suti@mail.com",
                "phone_number" => "081244636345",
                "address" => "Jalan Munir XI No.12",
                "role" => 0
            ],
            [
                "username" => "jonathan",
                "password" => "420",
                "display_name" => "Jonathan Josquare",
                "email" => "jo@jo.com",
                "phone_number" => "08884929503",
                "address" => "Jalan Ngagel No.34",
                "role" => 1
            ],
            [
                "username" => "walter",
                "password" => "666",
                "display_name" => "Walter Black",
                "email" => "black@heisenberg.com",
                "phone_number" => "081388359405",
                "address" => "Jalan Antah IX No.27",
                "role" => 1
            ],
            [
                "username" => "robert",
                "password" => "789",
                "display_name" => "Robert Cllosenheimer",
                "email" => "trinity@manhattan.com",
                "phone_number" => "080148479999",
                "address" => "Jalan Apah No.9",
                "role" => 1
            ],
        ];

        foreach ($usersData as $userData) {
            User::create($userData);
        }
    }
}
