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
        Schema::create('users_subjects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->foreign('user_id', 'user_fk_10015300')->references('id')->on('users');
            $table->unsignedBigInteger("subject_id");
            $table->foreign('subject_id', 'subject_fk_10016300')->references('id')->on('subjects');
            $table->integer('t_copies');
            $table->integer('phase');
            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
