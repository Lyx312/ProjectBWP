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
        Schema::dropIfExists('carts');

        Schema::create('carts', function (Blueprint $table) {
            $table->id("cart_id");
            $table->foreignId("cart_item_id")->constrained("items", "item_id");
            $table->integer("cart_item_price", false, true);
            $table->integer("cart_item_quantity", false, true);
            $table->integer("cart_subtotal", false, true);
            $table->string("cart_owner", 100);
            $table->foreign("cart_owner")->references("username")->on("users");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
