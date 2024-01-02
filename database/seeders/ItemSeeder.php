<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $itemsData = [
            [
                "item_id" => 1,
                "item_name" => "Sofa-L Shape 3 Seat",
                "item_description" => "A very comfortable sofa that's perfect to use in the living room",
                "item_price" => 2390000,
                "item_stock" => 7,
                "item_category" => 3,
                "item_seller" => "jonathan"
            ],
            [
                "item_id" => 2,
                "item_name" => "IPHONE 20XXM3L Pro Max",
                "item_description" => "Apple's latest model of IPHONE that will blow your mind from it's new technology: more detailed camera!",
                "item_price" => 14999000,
                "item_stock" => 5,
                "item_category" => 1,
                "item_seller" => "jonathan"
            ],
            [
                "item_id" => 3,
                "item_name" => "Chess V2.1 Complete Set",
                "item_description" => "A complete set of the chess game in it's latest patch: now there're two kings!",
                "item_price" => 449000,
                "item_stock" => 24,
                "item_category" => 6,
                "item_seller" => "walter"
            ],
            [
                "item_id" => 4,
                "item_name" => "The Communist Manifesto",
                "item_description" => "We are not responsible of anything should you get arrested as a consequence of this book.",
                "item_price" => 119000,
                "item_stock" => 3,
                "item_category" => 5,
                "item_seller" => "walter"
            ],
            [
                "item_id" => 5,
                "item_name" => "Microwave Oven",
                "item_description" => "An all new microwave with the latest technology to heat up your food in less than a second",
                "item_price" => 1290000,
                "item_stock" => 9,
                "item_category" => 2,
                "item_seller" => "robert"
            ],
        ];

        foreach ($itemsData as $itemData) {
            Item::create($itemData);
        }
    }
}
