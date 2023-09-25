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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->bigInteger('nId');
            $table->bigInteger('phone');
            $table->string('email')->unique();
            $table->string('password');
            $table->foreignId('operation_id')->constrained('operations')->onDelete('cascade');
            $table->boolean('admin_approve')->default(false);
            $table->boolean('operation_approve')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
