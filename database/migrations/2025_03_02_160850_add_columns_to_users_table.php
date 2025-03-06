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
        Schema::table('users', function (Blueprint $table) {
            $table->string('nic')->unique()->after('password');
            $table->string('address')->after('nic');
            $table->string('mobile')->after('address');
            $table->string('gender')->nullable()->after('mobile');
            $table->foreignId('territory_id')->constrained('tterritories')->onDelete('cascade')->after('gender');
            $table->string('username')->unique()->after('territory_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
