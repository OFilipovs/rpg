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
        Schema::create('land_plots', function (Blueprint $table) {
            $table->id();
            $table->string('cadastral_designation', 11);
            $table->decimal('area_hectares', 10, 2);
            $table->date('measurement_date');
            $table->foreignId('property_id')->constrained('properties');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('land_plots');
    }
};
