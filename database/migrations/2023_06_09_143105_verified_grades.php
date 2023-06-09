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
        Schema::create('v_grades', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('secret');
            $table->foreign('secret', 'secret_fk_100181523')->references('id')->on('secrets')->cascadeOnDelete();
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
