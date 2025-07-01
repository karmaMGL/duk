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
        Schema::create('discounts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable(false);
            $table->string('code')->unique()->nullable(false);
            $table->unsignedBigInteger('company_id')->nullable();
            $table->decimal('discount_amount', 10, 2)->nullable(false);
            $table->date('start_date')->nullable(false);
            $table->date('end_date')->nullable(false);
            $table->boolean('is_active')->default(true);
            $table->integer('usage_limit')->default(1);
            $table->unsignedBigInteger('created_userid')->nullable();
            $table->unsignedBigInteger('updated_userid')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discounts');
    }
};
