<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    protected $connection = 'mysql';
    public function run(): void
    {
        $ordersData = [
            [
                "order_id" => 1,
                "order_buyer" => "bobi",
                "order_total" => 5229000
            ],
            [
                "order_id" => 2,
                "order_buyer" => "andi",
                "order_total" => 357000
            ],
            [
                "order_id" => 3,
                "order_buyer" => "suti",
                "order_total" => 3680000
            ],
        ];

        foreach ($ordersData as $orderData) {
            Order::on($this->connection)->create($orderData);
        }
    }
}
