<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (Schema::hasTable('order_details')) {
            Schema::table('order_details', function (Blueprint $table) {
                $table->dropForeign(['detail_item_id']);
            });
        }
        if (Schema::hasTable('carts')) {
            Schema::table('carts', function (Blueprint $table) {
                $table->dropForeign(['cart_item_id']);
            });
        }
        if (Schema::hasTable('discounts')) {
            Schema::table('discounts', function (Blueprint $table) {
                //$table->dropForeign(['discount_item_id']);
            });
        }
        Schema::dropIfExists('items');

        Schema::create('items', function (Blueprint $table) {
            $table->id("item_id");
            $table->string("item_name", 200);
            $table->string("item_description", 500);
            $table->integer("item_price", false, true);
            $table->integer("item_stock", false, true)->default(0);
            $table->foreignId("item_category")->constrained("categories", "category_id");
            $table->string("item_seller", 100);
            $table->foreign("item_seller")->references("username")->on("users");
            $table->timestampsTz();
            $table->softDeletesTz();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('order_details')) {
            Schema::table('order_details', function (Blueprint $table) {
                $table->dropForeign(['detail_item_id']);
            });
        }
        if (Schema::hasTable('carts')) {
            Schema::table('carts', function (Blueprint $table) {
                $table->dropForeign(['cart_item_id']);
            });
        }
        if (Schema::hasTable('discounts')) {
            Schema::table('discounts', function (Blueprint $table) {
                $table->dropForeign(['discount_item_id']);
            });
        }
        Schema::dropIfExists('items');
    }
};
