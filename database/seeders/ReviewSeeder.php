<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $reviewsData = [
            [
                "review_id" => 1,
                "review_user" => "bobi",
                "review_item_id" => 1,
                "review_rating" => 4.5,
                "review_text" => "Very comfortable and affordable. Deffinitely recommended!",
            ],
            [
                "review_id" => 2,
                "review_user" => "bobi",
                "review_item_id" => 3,
                "review_rating" => 3,
                "review_text" => "A very nice spin on the original chess. Very fun to play with family. Slight issue is it's a bit hard to learn, but once you got the hang of it, it starts to get really fun!",
            ],
            [
                "review_id" => 3,
                "review_user" => "andi",
                "review_item_id" => 4,
                "review_rating" => 5,
                "review_text" => "Interesting book indeed. ;)",
            ],
            [
                "review_id" => 4,
                "review_user" => "suti",
                "review_item_id" => 1,
                "review_rating" => 5,
                "review_text" => "A soft sofa with nice color that fits perfectly at my home! 10/10",
            ],
            [
                "review_id" => 5,
                "review_user" => "suti",
                "review_item_id" => 5,
                "review_rating" => 2,
                "review_text" => "After using it for a few months it suddenly broke down. I hope I can get a refund",
            ],
        ];

        foreach ($reviewsData as $reviewData) {
            Review::create($reviewData);
        }
    }
}
