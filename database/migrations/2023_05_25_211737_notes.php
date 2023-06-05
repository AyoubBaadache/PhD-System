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
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('secret');
            $table->unsignedBigInteger('folder');
            $table->foreign('secret', 'secret_fk_10016399')->references('id')->on('secrets')->cascadeOnDelete();
            $table->foreign('folder', 'folder_fk_10016388')->references('id')->on('users_subjects')->cascadeOnDelete();
            $table->double('note')->nullable();
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
