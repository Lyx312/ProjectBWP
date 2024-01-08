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
                $table->dropForeign(['cart_discount_id']);
            });
        }
        Schema::dropIfExists('discounts');

        Schema::create('discounts', function (Blueprint $table) {
            $table->id("discount_id");
            $table->string("discount_name", 100);
            $table->foreignId("discount_item_id")->constrained("items", "item_id");
            $table->integer("discount_amount", false, true);
            $table->dateTimeTz("discount_start_date");
            $table->dateTimeTz("discount_end_date");
            $table->timestampsTz();
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
                $table->dropForeign(['cart_discount_id']);
            });
        }

        Schema::dropIfExists('discounts');
    }
};
