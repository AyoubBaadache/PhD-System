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
        Schema::create('final_grades', function (Blueprint $table) {
            $table->id();
            $table->double('Final_AVG');
            $table->unsignedBigInteger("secret");
            $table->foreign('secret', 'secret_100181235')->references('id')->on('secrets')->cascadeOnDelete();
            $table->string("status")->nullable();
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
