<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // In 2025_06_26_113652_alter_user.php
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone')->nullable()->unique();
            $table->string('img_url')->nullable();
            $table->string('description')->nullable();
            $table->boolean('is_active')->default(true);
            $table->string('mac_address')->nullable();
            $table->boolean('has_active_subscription')->default(false); // Renamed from is_paid
            $table->unsignedBigInteger('current_price_id')->nullable(); // Reference to current price
            $table->unsignedBigInteger('created_userid')->nullable();
            $table->unsignedBigInteger('updated_userid')->nullable();
            // Removed payment-related fields as they belong in payments table
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('phone');
            $table->dropColumn('img_url');
            $table->dropColumn('description');
            $table->dropColumn('is_active');
            $table->dropColumn('mac_address');
            $table->dropColumn('has_active_subscription');
            $table->dropColumn('current_price_id');
            $table->dropColumn('created_userid');
            $table->dropColumn('updated_userid');
        });
    }
};
