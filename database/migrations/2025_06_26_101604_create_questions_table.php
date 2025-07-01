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
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('img_url');
            $table->unsignedBigInteger('section_id');
            $table->boolean('is_active')->default(true);
            $table->unsignedBigInteger('answer_id');
            $table->text("why_correct")->nullable();
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
        Schema::dropIfExists('questions');
    }
};
