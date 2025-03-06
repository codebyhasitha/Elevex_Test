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
        Schema::create('tterritories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('zone_id');
            $table->unsignedBigInteger('region_id');
            $table->string('territory_code')->unique();
            $table->string('territory_name');
            $table->timestamps();

            $table->foreign('zone_id')->references('id')->on('zones')->onDelete('cascade');
            $table->foreign('region_id')->references('id')->on('rregions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tterritories');
    }
};
