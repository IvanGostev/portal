<?php

use App\Models\Shipment;
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
        Schema::create('evaluations', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Shipment::class)->constrained();
            $table->integer('speed')->default(5);
            $table->longText('speed_comment')->nullable();
            $table->integer('quality')->default(5);
            $table->longText('quality_comment')->nullable();
            $table->integer('conditions')->default(5);
            $table->longText('conditions_comment')->nullable();
            $table->integer('interaction')->default(5);
            $table->longText('interaction_comment')->nullable();
            $table->longText('comment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluations');
    }
};
