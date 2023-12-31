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
        Schema::create('products', function (Blueprint $table) {
            $table->id("product_id");
            $table->unsignedBigInteger('supplier_id');
            $table->foreign('supplier_id')->references('supplier_id')->on('suppliers')->onDelete('cascade');
            $table->string("product_name");
            $table->string('status')->default('ACTIVE');
            $table->string('image')->nullable();
            $table->string('category');
            $table->string("brand");
            $table->string("description");
            $table->string("size");
            $table->string("color");
            $table->integer("price");
            //$table->integer("quantity")->nullable();
            $table->integer('stock');
            //$table->string('location');
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
