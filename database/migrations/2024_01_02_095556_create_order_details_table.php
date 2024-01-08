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
        Schema::dropIfExists('order_details');

        Schema::create('order_details', function (Blueprint $table) {
            $table->id("detail_id");
            $table->foreignId("detail_order_id")->constrained("orders", "order_id");
            $table->foreignId("detail_item_id")->constrained("items", "item_id");
            $table->integer("detail_item_price", false, true);
            $table->foreignId("detail_discount_id")->nullable()->constrained("discounts", "discount_id");
            $table->integer("detail_item_quantity", false, true);
            $table->integer("detail_subtotal", false, true);
            $table->timestampsTz();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_details');
    }
};
