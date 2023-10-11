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
        Schema::create('giftcards', function (Blueprint $table) {
            $table->id("giftcard_id");
            $table->string("giftcard_name");
            $table->string('status')->default('ACTIVE');
            $table->integer("amount");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('giftcards');
    }
};
