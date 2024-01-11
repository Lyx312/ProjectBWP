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
                "item_image" => "ItemImages/ItemImage1.png",
                "item_price" => 2390000,
                "item_stock" => 7,
                "item_category" => 3,
                "item_seller" => "jonathan"
            ],
            [
                "item_id" => 2,
                "item_name" => "IPHONE 20XXM3L Pro Max",
                "item_description" => "Apple's latest model of IPHONE that will blow your mind from it's new technology: more detailed camera!",
                "item_image" => "ItemImages/ItemImage2.jpg",
                "item_price" => 14999000,
                "item_stock" => 5,
                "item_category" => 1,
                "item_seller" => "jonathan"
            ],
            [
                "item_id" => 3,
                "item_name" => "Chess V2.1 Complete Set",
                "item_description" => "A complete set of the chess game in it's latest patch: now there're two kings!",
                "item_image" => "ItemImages/ItemImage3.jpg",
                "item_price" => 449000,
                "item_stock" => 24,
                "item_category" => 6,
                "item_seller" => "walter"
            ],
            [
                "item_id" => 4,
                "item_name" => "The Communist Manifesto",
                "item_description" => "We are not responsible of anything should you get arrested as a consequence of this book.",
                "item_image" => "ItemImages/ItemImage4.jpg",
                "item_price" => 119000,
                "item_stock" => 3,
                "item_category" => 5,
                "item_seller" => "walter"
            ],
            [
                "item_id" => 5,
                "item_name" => "SwiftHeat Microwave Oven",
                "item_description" => "An all new microwave with the latest technology to heat up your food in less than a second",
                "item_image" => "ItemImages/ItemImage5.jpg",
                "item_price" => 1290000,
                "item_stock" => 9,
                "item_category" => 2,
                "item_seller" => "robert"
            ],
            [
                "item_id" => 6,
                "item_name" => "Smartwatch X2",
                "item_description" => "Stay connected and monitor your health with this advanced smartwatch.",
                "item_image" => "ItemImages/ItemImage6.jpg",
                "item_price" => 899000,
                "item_stock" => 15,
                "item_category" => 1,
                "item_seller" => "david"
            ],
            [
                "item_id" => 7,
                "item_name" => "Garden Furniture Set",
                "item_description" => "Upgrade your outdoor space with this stylish and comfortable garden furniture set.",
                "item_image" => "ItemImages/ItemImage7.jpg",
                "item_price" => 2799000,
                "item_stock" => 8,
                "item_category" => 3,
                "item_seller" => "eva"
            ],
            [
                "item_id" => 8,
                "item_name" => "Virtual Reality Headset",
                "item_description" => "Immerse yourself in a virtual world with this cutting-edge VR headset.",
                "item_image" => "ItemImages/ItemImage8.jpg",
                "item_price" => 1899000,
                "item_stock" => 12,
                "item_category" => 1,
                "item_seller" => "frank"
            ],
            [
                "item_id" => 9,
                "item_name" => "Organic Skin Care Set",
                "item_description" => "Pamper your skin with this organic and cruelty-free skincare collection.",
                "item_image" => "ItemImages/ItemImage9.png",
                "item_price" => 599000,
                "item_stock" => 20,
                "item_category" => 8,
                "item_seller" => "grace"
            ],
            [
                "item_id" => 10,
                "item_name" => "Wireless Gaming Mouse",
                "item_description" => "Enhance your gaming experience with this high-performance wireless gaming mouse.",
                "item_image" => "ItemImages/ItemImage10.jpg",
                "item_price" => 349000,
                "item_stock" => 18,
                "item_category" => 9,
                "item_seller" => "henry"
            ],
            [
                "item_id" => 11,
                "item_name" => "Fitness Tracker Bracelet",
                "item_description" => "Achieve your fitness goals with this stylish and functional fitness tracker.",
                "item_image" => "ItemImages/ItemImage11.jpg",
                "item_price" => 499000,
                "item_stock" => 25,
                "item_category" => 7,
                "item_seller" => "isabel"
            ],
            [
                "item_id" => 12,
                "item_name" => "Leather Messenger Bag",
                "item_description" => "Carry your essentials in style with this genuine leather messenger bag.",
                "item_image" => "ItemImages/ItemImage12.jpg",
                "item_price" => 1299000,
                "item_stock" => 10,
                "item_category" => 4,
                "item_seller" => "jack"
            ],
            [
                "item_id" => 13,
                "item_name" => "Digital Drawing Tablet",
                "item_description" => "Unleash your creativity with this advanced digital drawing tablet for artists.",
                "item_image" => "ItemImages/ItemImage13.jpg",
                "item_price" => 2199000,
                "item_stock" => 14,
                "item_category" => 9,
                "item_seller" => "david"
            ],
            [
                "item_id" => 14,
                "item_name" => "High-Performance Blender",
                "item_description" => "Blend smoothies and shakes effortlessly with this powerful high-performance blender.",
                "item_image" => "ItemImages/ItemImage14.jpg",
                "item_price" => 799000,
                "item_stock" => 22,
                "item_category" => 2,
                "item_seller" => "eva"
            ],
            [
                "item_id" => 15,
                "item_name" => "Classic Board Games Set",
                "item_description" => "Enjoy quality time with family and friends with this classic board games set.",
                "item_image" => "ItemImages/ItemImage15.jpg",
                "item_price" => 499000,
                "item_stock" => 16,
                "item_category" => 6,
                "item_seller" => "frank"
            ],
            [
                "item_id" => 16,
                "item_name" => "Ultra HD Smart TV",
                "item_description" => "Experience stunning visuals with this Ultra HD Smart TV, perfect for your home entertainment.",
                "item_image" => "ItemImages/ItemImage16.jpg",
                "item_price" => 5499000,
                "item_stock" => 10,
                "item_category" => 1,
                "item_seller" => "jonathan"
            ],
            [
                "item_id" => 17,
                "item_name" => "Designer Sunglasses",
                "item_description" => "Add a touch of style to your look with these high-quality designer sunglasses.",
                "item_image" => "ItemImages/ItemImage17.jpg",
                "item_price" => 1299000,
                "item_stock" => 15,
                "item_category" => 8,
                "item_seller" => "jonathan"
            ],
            [
                "item_id" => 18,
                "item_name" => "Home Security Camera System",
                "item_description" => "Keep your home safe and secure with this advanced home security camera system.",
                "item_image" => "ItemImages/ItemImage18.jpg",
                "item_price" => 2999000,
                "item_stock" => 8,
                "item_category" => 3,
                "item_seller" => "walter"
            ],
            [
                "item_id" => 19,
                "item_name" => "Leather Wallet",
                "item_description" => "Store your essentials in style with this genuine leather wallet.",
                "item_image" => "ItemImages/ItemImage19.jpg",
                "item_price" => 799000,
                "item_stock" => 20,
                "item_category" => 4,
                "item_seller" => "walter"
            ],
            [
                "item_id" => 20,
                "item_name" => "Smart Home Thermostat",
                "item_description" => "Control your home's temperature with ease using this smart home thermostat.",
                "item_image" => "ItemImages/ItemImage20.jpg",
                "item_price" => 1499000,
                "item_stock" => 12,
                "item_category" => 2,
                "item_seller" => "robert"
            ],
            [
                "item_id" => 21,
                "item_name" => "Noise-Canceling Headphones",
                "item_description" => "Immerse yourself in music without distractions with these noise-canceling headphones.",
                "item_image" => "ItemImages/ItemImage21.jpg",
                "item_price" => 999000,
                "item_stock" => 18,
                "item_category" => 1,
                "item_seller" => "david"
            ],
            [
                "item_id" => 22,
                "item_name" => "Outdoor Camping Tent",
                "item_description" => "Enjoy the great outdoors with this durable and spacious camping tent.",
                "item_image" => "ItemImages/ItemImage22.jpg",
                "item_price" => 1899000,
                "item_stock" => 14,
                "item_category" => 7,
                "item_seller" => "eva"
            ],
            [
                "item_id" => 23,
                "item_name" => "Professional Camera Kit",
                "item_description" => "Capture stunning moments with this professional-grade camera kit.",
                "item_image" => "ItemImages/ItemImage23.jpg",
                "item_price" => 3499000,
                "item_stock" => 16,
                "item_category" => 5,
                "item_seller" => "frank"
            ],
            [
                "item_id" => 24,
                "item_name" => "Luxury Bath Towel Set",
                "item_description" => "Indulge in luxury with this soft and absorbent bath towel set for your bathroom.",
                "item_image" => "ItemImages/ItemImage24.jpg",
                "item_price" => 499000,
                "item_stock" => 22,
                "item_category" => 8,
                "item_seller" => "grace"
            ],
            [
                "item_id" => 25,
                "item_name" => "High-End Gaming Laptop",
                "item_description" => "Experience gaming at its finest with this high-performance gaming laptop.",
                "item_image" => "ItemImages/ItemImage25.jpg",
                "item_price" => 6999000,
                "item_stock" => 10,
                "item_category" => 1,
                "item_seller" => "henry"
            ],
            [
                "item_id" => 26,
                "item_name" => "Premium Leather Office Chair",
                "item_description" => "Upgrade your office with this premium leather office chair, providing comfort and style.",
                "item_image" => "ItemImages/ItemImage26.png",
                "item_price" => 1299000,
                "item_stock" => 15,
                "item_category" => 9,
                "item_seller" => "isabel"
            ],
            [
                "item_id" => 27,
                "item_name" => "Portable Outdoor Grill",
                "item_description" => "Enjoy outdoor cooking with this portable and easy-to-use grill.",
                "item_image" => "ItemImages/ItemImage27.jpg",
                "item_price" => 1499000,
                "item_stock" => 18,
                "item_category" => 10,
                "item_seller" => "jack"
            ],
            [
                "item_id" => 28,
                "item_name" => "Wireless Charging Pad",
                "item_description" => "Charge your devices effortlessly with this sleek wireless charging pad.",
                "item_image" => "ItemImages/ItemImage28.jpg",
                "item_price" => 499000,
                "item_stock" => 16,
                "item_category" => 1,
                "item_seller" => "david"
            ],
            [
                "item_id" => 29,
                "item_name" => "Designer Watch",
                "item_description" => "Accessorize in style with this elegant designer watch, perfect for any occasion.",
                "item_image" => "ItemImages/ItemImage29.jpg",
                "item_price" => 999000,
                "item_stock" => 20,
                "item_category" => 4,
                "item_seller" => "eva"
            ],
            [
                "item_id" => 30,
                "item_name" => "Electric Toothbrush",
                "item_description" => "Maintain oral hygiene with this advanced electric toothbrush, gentle on gums.",
                "item_image" => "ItemImages/ItemImage30.jpg",
                "item_price" => 199000,
                "item_stock" => 25,
                "item_category" => 8,
                "item_seller" => "frank"
            ],
            [
                "item_id" => 31,
                "item_name" => "Folding Bike",
                "item_description" => "Commute in style with this convenient and foldable bike for urban living.",
                "item_image" => "ItemImages/ItemImage31.jpg",
                "item_price" => 2499000,
                "item_stock" => 10,
                "item_category" => 7,
                "item_seller" => "grace"
            ],
            [
                "item_id" => 32,
                "item_name" => "Portable Bluetooth Speaker",
                "item_description" => "Take your music anywhere with this portable and high-quality Bluetooth speaker.",
                "item_image" => "ItemImages/ItemImage32.jpg",
                "item_price" => 699000,
                "item_stock" => 14,
                "item_category" => 1,
                "item_seller" => "henry"
            ],
            [
                "item_id" => 33,
                "item_name" => "Handcrafted Ceramic Dinnerware Set",
                "item_description" => "Elevate your dining experience with this handcrafted ceramic dinnerware set.",
                "item_image" => "ItemImages/ItemImage33.jpg",
                "item_price" => 1699000,
                "item_stock" => 22,
                "item_category" => 10,
                "item_seller" => "isabel"
            ],
            [
                "item_id" => 34,
                "item_name" => "Compact Espresso Machine",
                "item_description" => "Indulge in your favorite coffee with this compact and efficient espresso machine.",
                "item_image" => "ItemImages/ItemImage34.jpg",
                "item_price" => 1299000,
                "item_stock" => 15,
                "item_category" => 2,
                "item_seller" => "jack"
            ],
            [
                "item_id" => 35,
                "item_name" => "Wireless Security Camera",
                "item_description" => "Keep an eye on your property with this wireless and high-definition security camera.",
                "item_image" => "ItemImages/ItemImage35.jpg",
                "item_price" => 899000,
                "item_stock" => 18,
                "item_category" => 3,
                "item_seller" => "david"
            ],
            [
                "item_id" => 36,
                "item_name" => "Professional Hair Dryer",
                "item_description" => "Achieve salon-quality hair drying with this professional-grade hair dryer.",
                "item_image" => "ItemImages/ItemImage36.jpg",
                "item_price" => 599000,
                "item_stock" => 20,
                "item_category" => 8,
                "item_seller" => "eva"
            ],
            [
                "item_id" => 37,
                "item_name" => "Smart Thermostatic Shower System",
                "item_description" => "Upgrade your shower experience with this smart thermostatic shower system.",
                "item_image" => "ItemImages/ItemImage37.jpg",
                "item_price" => 2499000,
                "item_stock" => 12,
                "item_category" => 3,
                "item_seller" => "frank"
            ],
            [
                "item_id" => 38,
                "item_name" => "High-Resolution Gaming Monitor",
                "item_description" => "Immerse yourself in gaming with this high-resolution and fast-refresh gaming monitor.",
                "item_image" => "ItemImages/ItemImage38.jpg",
                "item_price" => 1499000,
                "item_stock" => 16,
                "item_category" => 9,
                "item_seller" => "grace"
            ],
            [
                "item_id" => 39,
                "item_name" => "Classic Novels Collection",
                "item_description" => "Immerse yourself in timeless literature with this set of 5 classic novels, beautifully bound and presented.",
                "item_image" => "ItemImages/ItemImage39.jpg",
                "item_price" => 1499000,
                "item_stock" => 8,
                "item_category" => 5,
                "item_seller" => "henry"
            ],
            [
                "item_id" => 40,
                "item_name" => "Portable Solar Charger",
                "item_description" => "Charge your devices on the go with this eco-friendly and portable solar charger.",
                "item_image" => "ItemImages/ItemImage40.jpg",
                "item_price" => 799000,
                "item_stock" => 10,
                "item_category" => 1,
                "item_seller" => "isabel"
            ],
            [
                "item_id" => 41,
                "item_name" => "Smart Refrigerator",
                "item_description" => "Keep your food fresh with this smart refrigerator that comes with advanced features.",
                "item_image" => "ItemImages/ItemImage41.jpg",
                "item_price" => 3499000,
                "item_stock" => 14,
                "item_category" => 2,
                "item_seller" => "jack"
            ],
            [
                "item_id" => 42,
                "item_name" => "Adjustable Dumbbell Set",
                "item_description" => "Stay fit with this adjustable dumbbell set, suitable for a variety of workouts.",
                "item_image" => "ItemImages/ItemImage42.jpg",
                "item_price" => 1799000,
                "item_stock" => 18,
                "item_category" => 7,
                "item_seller" => "david"
            ],
            [
                "item_id" => 43,
                "item_name" => "High-Quality Bedding Set",
                "item_description" => "Experience comfort with this high-quality and luxurious bedding set for your bedroom.",
                "item_image" => "ItemImages/ItemImage43.jpg",
                "item_price" => 899000,
                "item_stock" => 20,
                "item_category" => 8,
                "item_seller" => "eva"
            ],
            [
                "item_id" => 44,
                "item_name" => "Bluetooth Fitness Earbuds",
                "item_description" => "Enhance your workouts with these Bluetooth fitness earbuds, designed for active lifestyles.",
                "item_image" => "ItemImages/ItemImage44.jpg",
                "item_price" => 499000,
                "item_stock" => 25,
                "item_category" => 7,
                "item_seller" => "frank"
            ],
            [
                "item_id" => 45,
                "item_name" => "Foldable Electric Scooter",
                "item_description" => "Navigate through the city effortlessly with this foldable and electric scooter.",
                "item_image" => "ItemImages/ItemImage45.jpg",
                "item_price" => 2499000,
                "item_stock" => 10,
                "item_category" => 7,
                "item_seller" => "grace"
            ],
            [
                "item_id" => 46,
                "item_name" => "Solar-Powered Outdoor Lights",
                "item_description" => "Illuminate your outdoor space with these energy-efficient solar-powered outdoor lights.",
                "item_image" => "ItemImages/ItemImage46.jpg",
                "item_price" => 699000,
                "item_stock" => 14,
                "item_category" => 3,
                "item_seller" => "henry"
            ],
            [
                "item_id" => 47,
                "item_name" => "High-Performance Laptop Bag",
                "item_description" => "Protect your laptop in style with this high-performance and durable laptop bag.",
                "item_image" => "ItemImages/ItemImage47.jpg",
                "item_price" => 1299000,
                "item_stock" => 16,
                "item_category" => 4,
                "item_seller" => "isabel"
            ],
            [
                "item_id" => 48,
                "item_name" => "Smart Home Voice Assistant",
                "item_description" => "Control your smart home devices with ease using this voice-activated smart home assistant.",
                "item_image" => "ItemImages/ItemImage48.jpg",
                "item_price" => 999000,
                "item_stock" => 22,
                "item_category" => 3,
                "item_seller" => "jack"
            ],
            [
                "item_id" => 49,
                "item_name" => "Electric Yoga Mat",
                "item_description" => "Enhance your yoga practice with this electric yoga mat, providing real-time feedback.",
                "item_image" => "ItemImages/ItemImage49.jpg",
                "item_price" => 1499000,
                "item_stock" => 10,
                "item_category" => 7,
                "item_seller" => "david"
            ],
            [
                "item_id" => 50,
                "item_name" => "Mystery Thriller Book Set",
                "item_description" => "Get lost in the suspense with this set of gripping mystery thriller novels.",
                "item_image" => "ItemImages/ItemImage50.jpg",
                "item_price" => 799000,
                "item_stock" => 10,
                "item_category" => 5,
                "item_seller" => "eva"
            ],
        ];

        foreach ($itemsData as $itemData) {
            Item::create($itemData);
        }
    }
}
