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
        Schema::create('forms', function (Blueprint $table) {
            $table->id();
            $table->integer('type');
            $table->integer('reson');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('nationality');
            $table->bigInteger('job_number');
            $table->string('job');
            $table->string('start_date');
            $table->string('end_date');
            $table->string('operation_admin');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('forms');
    }
};
