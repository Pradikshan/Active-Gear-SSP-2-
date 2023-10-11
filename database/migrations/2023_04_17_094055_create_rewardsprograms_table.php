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
        Schema::create('rewardsprograms', function (Blueprint $table) {
            $table->id("reward_program_ID");
            $table->string("reward_program_name");
            $table->string('status')->default('ACTIVE');
            $table->string("description");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rewardsprograms');
    }
};
