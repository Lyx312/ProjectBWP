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
                $table->dropForeign(['item_category']);
            });
        }
        Schema::dropIfExists('categories');

        Schema::create('categories', function (Blueprint $table) {
            $table->id("category_id");
            $table->string("category_name", 30);
            $table->timestampsTz();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('items')) {
            Schema::table('items', function (Blueprint $table) {
                $table->dropForeign(['item_category']);
            });
        }

        Schema::dropIfExists('categories');
    }
};
