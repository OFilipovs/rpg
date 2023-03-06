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
        Schema::create('land_plot_land_uses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('land_plot_id')->constrained('land_plots');
            $table->foreignId('land_use_id')->constrained('land_uses');
            $table->decimal('area_hectares', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('land_plot_land_uses');
    }
};
