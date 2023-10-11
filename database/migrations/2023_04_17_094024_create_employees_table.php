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
        Schema::create('employees', function (Blueprint $table) {
            // $table->id();
            $table->timestamps();
            $table->id("emp_id");
            $table->string("emp_name");
            $table->string('status')->default('ACTIVE');
            $table->string("image")->nullable();
            $table->string("emp_NIC_no");
            $table->string("emp_address");
            $table->string('email_address');
            $table->string('telephone_no');
            $table->string("emp_access_level");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
