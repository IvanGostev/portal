<?php

use App\Models\Shipment;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('evaluations', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained();
            $table->integer('first_parameter')->nullable();
            $table->integer('second_parameter')->nullable();
            $table->integer('third_parameter')->nullable();
            $table->integer('fourth_parameter')->nullable();
            $table->integer('fifth_parameter')->nullable();
            $table->integer('sixth_parameter')->nullable();
            $table->integer('seventh_parameter')->nullable();
            $table->integer('eighth_parameter')->nullable();
            $table->integer('ninth_parameter')->nullable();
            $table->integer('tenth_parameter')->nullable();
            $table->integer('eleventh_parameter')->nullable();
            $table->integer('twelfth_parameter')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('evaluations');
    }
};
