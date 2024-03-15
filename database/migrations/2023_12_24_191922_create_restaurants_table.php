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
        Schema::create('restaurants', function (Blueprint $table) {
           $table->id();
           $table->string('name', 100);
           $table->string('area', 10);
           $table->string('genre', 100);
           $table->string('summary', 300);
           $table->string('url', 100);
           $table->timestamp('created_at')->useCurrent()->nullable();
           $table->timestamp('updated_at')->useCurrent()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurants');
    }
};
