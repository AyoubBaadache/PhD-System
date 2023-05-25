<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('claims', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->unsignedBigInteger('subject_id');
            $table->foreign('subject_id', 'subject_fk_10886300')->references('id')->on('subjects');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'user_fk_10595300')->references('id')->on('users');
            $table->string("claim");
            $table->string("status");
            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('claims');
    }
};
