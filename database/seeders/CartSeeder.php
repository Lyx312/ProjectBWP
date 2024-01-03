<?php

namespace Database\Seeders;

use App\Models\Cart;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cartsData = [
            [
                "cart_id" => 1,
                "cart_item_id" => 1,
                "cart_item_price" => 2390000,
                "cart_item_quantity" => 2,
                "cart_subtotal" => 4780000,
                "cart_owner" => "andi"
            ],
            [
                "cart_id" => 2,
                "cart_item_id" => 3,
                "cart_item_price" => 449000,
                "cart_item_quantity" => 1,
                "cart_subtotal" => 449000,
                "cart_owner" => "andi"
            ],
            [
                "cart_id" => 3,
                "cart_item_id" => 4,
                "cart_item_price" => 119000,
                "cart_item_quantity" => 3,
                "cart_subtotal" => 357000,
                "cart_owner" => "andi"
            ],
            [
                "cart_id" => 4,
                "cart_item_id" => 5,
                "cart_item_price" => 1290000,
                "cart_item_quantity" => 1,
                "cart_subtotal" => 1290000,
                "cart_owner" => "andi"
            ],
        ];

        foreach ($cartsData as $cartData) {
            Cart::create($cartData);
        }
    }
}
