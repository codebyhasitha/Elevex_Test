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
        Schema::create('freeissue', function (Blueprint $table) {
            $table->id();
            $table->string('freeissue_name');
            $table->string('freeissue_type');
            $table->string('purchse_product');
            $table->string('free_prodcut');
            $table->string('purchase_Quantity');
            $table->string('Free_Quantity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('freeissue');
    }
};
