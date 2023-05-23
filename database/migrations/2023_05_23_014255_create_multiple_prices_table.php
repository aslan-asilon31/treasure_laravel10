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
        Schema::create('multiple_prices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('member_id');
            $table->integer('price');
            $table->integer('qty');
            $table->integer('discount');
            $table->string('slug');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('multiple_prices');
    }
};
