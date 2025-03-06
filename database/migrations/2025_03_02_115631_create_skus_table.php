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
        Schema::create('skus', function (Blueprint $table) {
            $table->id();
            $table->string('sku_id')->unique();
            $table->string('sku_code')->unique();
            $table->string('sku_name');
            $table->decimal('mrp', 8, 2);
            $table->decimal('distributor_price', 8, 2);
            $table->string('weight_volume');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skus');
    }
};
