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
        Schema::create('exam_history', function (Blueprint $table) {
            $table->increments('history_id');
            $table->string('participant', 128)->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedInteger('exam_id');
            $table->integer('total_score');
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('exam_id')->references('exam_id')->on('exams')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exam_history');
    }
};
