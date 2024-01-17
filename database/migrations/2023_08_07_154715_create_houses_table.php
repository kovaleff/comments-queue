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
        Schema::create('houses', function (Blueprint $table) {
            $table->comment('laravel test');
            $table->id();
            $table->string('name');
            $table->float('price', 8, 2);
            $table->integer('bedrooms');
            $table->integer('bathrooms')->nullable()->default(null);
            $table->integer('storeys')->default(1);
            $table->integer('garages')->nullable()->default(null);
            //todo indexws
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('houses');
    }
};
