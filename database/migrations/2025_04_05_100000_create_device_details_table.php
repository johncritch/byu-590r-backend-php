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
        Schema::create('device_details', function (Blueprint $table) {
            $table->id();
            $table->text('model_name');
            $table->text('description');
            $table->text('specifications')->nullable();;
            $table->text('picture')->nullable();
            $table->date('release_date');
            $table->decimal('release_price', 10, 2);
            $table->bigInteger('units_sold')->default(0);
            $table->timestamps();
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('device_details');
    }
};
