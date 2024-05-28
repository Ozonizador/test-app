<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->increments('answer_id');
            $table->unsignedInteger('question_id');
            $table->string('answer', 1024);
            $table->boolean('is_correct');
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('question_id')->references('question_id')->on('questions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.``
     */
    public function down(): void
    {
        Schema::dropIfExists('answers');
    }
};
