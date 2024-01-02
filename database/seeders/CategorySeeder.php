<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categoriesData = [
            [
                "category_id" => 1,
                "category_name" => "Electronics",
            ],
            [
                "category_id" => 2,
                "category_name" => "Appliances",
            ],
            [
                "category_id" => 3,
                "category_name" => "Home and Garden",
            ],
            [
                "category_id" => 4,
                "category_name" => "Clothing and Accessories",
            ],
            [
                "category_id" => 5,
                "category_name" => "Books and Media",
            ],
            [
                "category_id" => 6,
                "category_name" => "Toys and Games",
            ],
            [
                "category_id" => 7,
                "category_name" => "Sports and Fitness",
            ],
            [
                "category_id" => 8,
                "category_name" => "Beauty and Personal Care",
            ],
            [
                "category_id" => 9,
                "category_name" => "Office Supplies",
            ],
            [
                "category_id" => 10,
                "category_name" => "Food and Groceries",
            ],
        ];

        foreach ($categoriesData as $categoryData) {
            Category::create($categoryData);
        }
    }
}
