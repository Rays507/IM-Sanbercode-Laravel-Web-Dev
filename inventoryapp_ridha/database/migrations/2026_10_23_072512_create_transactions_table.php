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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("product_id")->foreignId("product_id")->references("id")->on("products")->onDelete("cascade")->onupdate("cascade");
            $table->unsignedBigInteger("user_id")->foreignId("user_id")->references("id")->on("users")->onDelete("cascade")->onupdate("cascade");
            $table->integer("amount");
            $table->text("notes")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
