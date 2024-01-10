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
        Schema::dropIfExists('reviews');

        Schema::create('reviews', function (Blueprint $table) {
            $table->id("review_id");
            $table->string("review_user", 100);
            $table->foreign("review_user")->references("username")->on("users");
            $table->foreignId("review_item_id")->constrained("items", "item_id");
            $table->decimal("review_rating", 2, 1);
            $table->string("review_text", 500);
            $table->timestampsTz();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
