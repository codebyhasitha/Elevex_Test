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
        Schema::create('purchase_orders', function (Blueprint $table) {
            $table->id();
            $table->string('po_number')->unique();

            $table->unsignedBigInteger('zone_id');
            $table->unsignedBigInteger('region_id');
            $table->unsignedBigInteger('territory_id');
            $table->unsignedBigInteger('distributor_id');

            $table->foreign('zone_id')->references('id')->on('zones');
            $table->foreign('region_id')->references('id')->on('rregions');;
            $table->foreign('territory_id')->references('id')->on('tterritories');;
            $table->foreign('distributor_id')->references('id')->on('users');;
            $table->string('date')->nullable();
            $table->text('remark')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_orders');
    }
};
