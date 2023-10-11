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
        Schema::create('customer_inquiries', function (Blueprint $table) {
            $table->string("name");
            $table->string("email");
            $table->bigInteger("tele_no");
            $table->string('order_no')->nullable()->default('N/A');
            $table->string("reason_for_complaint");
            $table->string("inquiry");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_inquiries');
    }
};
