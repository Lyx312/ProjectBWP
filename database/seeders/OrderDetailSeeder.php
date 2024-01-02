<?php

namespace Database\Seeders;

use App\Models\OrderDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $orderDetailsData = [
            [
                "detail_id" => 1,
                "detail_order_id" => 1,
                "detail_item_id" => 1,
                "detail_item_price" => 2390000,
                "detail_item_quantity" => 2,
                "detail_subtotal" => 4780000
            ],
            [
                "detail_id" => 2,
                "detail_order_id" => 1,
                "detail_item_id" => 3,
                "detail_item_price" => 449000,
                "detail_item_quantity" => 1,
                "detail_subtotal" => 449000
            ],
            [
                "detail_id" => 3,
                "detail_order_id" => 2,
                "detail_item_id" => 4,
                "detail_item_price" => 119000,
                "detail_item_quantity" => 3,
                "detail_subtotal" => 357000
            ],
            [
                "detail_id" => 4,
                "detail_order_id" => 3,
                "detail_item_id" => 1,
                "detail_item_price" => 2390000,
                "detail_item_quantity" => 1,
                "detail_subtotal" => 2390000
            ],
            [
                "detail_id" => 5,
                "detail_order_id" => 3,
                "detail_item_id" => 5,
                "detail_item_price" => 1290000,
                "detail_item_quantity" => 1,
                "detail_subtotal" => 1290000
            ],
        ];

        foreach ($orderDetailsData as $orderDetailData) {
            OrderDetail::create($orderDetailData);
        }
    }
}
