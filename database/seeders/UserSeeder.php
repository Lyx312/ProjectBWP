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
                "phone_number" => "088849295035",
                "address" => "Jalan Ngagel No.34",
                "role" => 1
            ],
            [
                "username" => "siska",
                "password" => "246",
                "display_name" => "Siska Putri",
                "email" => "siska@mail.com",
                "phone_number" => "085623451234",
                "address" => "Jalan Dahlia No.3",
                "role" => 0
            ],
            [
                "username" => "eko",
                "password" => "135",
                "display_name" => "Eko Prasetyo",
                "email" => "eko@mail.com",
                "phone_number" => "087712345678",
                "address" => "Jalan Mangga No.8",
                "role" => 0
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
            [
                "username" => "david",
                "password" => "100",
                "display_name" => "David's Treasures",
                "email" => "david.treasures@example.com",
                "phone_number" => "084567890123",
                "address" => "Jalan Indah No.4",
                "role" => 1
            ],
            [
                "username" => "eva",
                "password" => "374",
                "display_name" => "Eva's Creations",
                "email" => "eva.creations@example.com",
                "phone_number" => "085678901234",
                "address" => "Jalan Damai No.5",
                "role" => 1
            ],
            [
                "username" => "frank",
                "password" => "888",
                "display_name" => "Frank's Depot",
                "email" => "frank.depot@example.com",
                "phone_number" => "086789012345",
                "address" => "Jalan Sentosa No.6",
                "role" => 1
            ],
            [
                "username" => "grace",
                "password" => "444",
                "display_name" => "Grace's Boutique",
                "email" => "grace.boutique@example.com",
                "phone_number" => "087890123456",
                "address" => "Jalan Sejahtera No.7",
                "role" => 1
            ],
            [
                "username" => "henry",
                "password" => "999",
                "display_name" => "Henry's Gallery",
                "email" => "henry.gallery@example.com",
                "phone_number" => "088901234567",
                "address" => "Jalan Harmoni No.8",
                "role" => 1
            ],
            [
                "username" => "isabel",
                "password" => "111",
                "display_name" => "Isabel's Emporium",
                "email" => "isabel.emporium@example.com",
                "phone_number" => "089012345678",
                "address" => "Jalan Impian No.9",
                "role" => 1
            ],
            [
                "username" => "jack",
                "password" => "746",
                "display_name" => "Jack's Treasures",
                "email" => "jack.treasures@example.com",
                "phone_number" => "090123456789",
                "address" => "Jalan Jaya No.10",
                "role" => 1
            ],
        ];

        foreach ($usersData as $userData) {
            User::create($userData);
        }
    }
}
