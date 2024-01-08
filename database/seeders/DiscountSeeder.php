<?php

namespace Database\Seeders;

use App\Models\Discount;
use DateTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DiscountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $discountsData = [
            [
                "discount_id" => 1,
                "discount_name" => "New Year SALE!",
                "discount_item_id" => 1,
                "discount_amount" => 30,
                "discount_start_date" => new DateTime("2024-01-01 00:00:00"),
                "discount_end_date" => new DateTime("2024-01-31 23:59:59"),
            ],
            [
                "discount_id" => 2,
                "discount_name" => "Christmast Sale",
                "discount_item_id" => 5,
                "discount_amount" => 20,
                "discount_start_date" => new DateTime("2023-12-15 00:00:00"),
                "discount_end_date" => new DateTime("2024-01-15 23:59:59"),
            ],
        ];

        foreach ($discountsData as $discountData) {
            Discount::create($discountData);
        }
    }
}
