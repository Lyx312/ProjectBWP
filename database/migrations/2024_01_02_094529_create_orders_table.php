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
                $table->dropForeign(['detail_order_id']);
            });
        }
        Schema::dropIfExists('orders');

        Schema::create('orders', function (Blueprint $table) {
            $table->id("order_id");
            $table->string("order_buyer", 100);
            $table->foreign("order_buyer")->references("username")->on("users");
            $table->integer("order_total", false, true);
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
                $table->dropForeign(['detail_order_id']);
            });
        }
        Schema::dropIfExists('orders');
    }
};
