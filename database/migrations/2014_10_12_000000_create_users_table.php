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
        if (Schema::hasTable('items')) {
            Schema::table('items', function (Blueprint $table) {
                $table->dropForeign(['item_seller']);
            });
        }
        if (Schema::hasTable('orders')) {
            Schema::table('orders', function (Blueprint $table) {
                $table->dropForeign(['order_buyer']);
            });
        }
        if (Schema::hasTable('carts')) {
            Schema::table('carts', function (Blueprint $table) {
                $table->dropForeign(['cart_owner']);
            });
        }
        if (Schema::hasTable('reviews')) {
            Schema::table('reviews', function (Blueprint $table) {
                $table->dropForeign(['review_user']);
            });
        }
        Schema::dropIfExists('users');

        Schema::create('users', function (Blueprint $table) {
            $table->string("username", 100)->primary();
            $table->string("password", 100);
            $table->string("name", 100);
            $table->string("profile_picture", 100)->nullable();
            $table->string("email", 100)->unique();
            $table->string("phone_number", 15);
            $table->string("address", 200);
            $table->integer("balance", false, true)->default(0);
            $table->tinyInteger("role");
            $table->boolean("is_banned")->default(0);
            $table->timestampsTz();
            $table->softDeletesTz();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('items')) {
            Schema::table('items', function (Blueprint $table) {
                $table->dropForeign(['item_seller']);
            });
        }
        if (Schema::hasTable('orders')) {
            Schema::table('orders', function (Blueprint $table) {
                $table->dropForeign(['order_buyer']);
            });
        }
        if (Schema::hasTable('carts')) {
            Schema::table('carts', function (Blueprint $table) {
                $table->dropForeign(['cart_owner']);
            });
        }
        if (Schema::hasTable('reviews')) {
            Schema::table('reviews', function (Blueprint $table) {
                $table->dropForeign(['review_user']);
            });
        }

        Schema::dropIfExists('users');
    }
};
