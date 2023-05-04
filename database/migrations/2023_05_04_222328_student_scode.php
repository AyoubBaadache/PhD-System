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
        Schema::create('secrets', function (Blueprint $table) {
            $table->id();
            $table->string('secret_code');
            $table->unsignedBigInteger("user_id");
            $table->foreign('user_id', 'user_fk_1001497')->references('id')->on('users');

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
