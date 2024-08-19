<?php

use App\Models\AnnexesType;
use App\Models\AnnexType;
use App\Models\User;
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
        Schema::create('annexes', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained();
            $table->foreignIdFor(AnnexType::class)->constrained();
            $table->date('start')->nullable();
            $table->date('finish')->nullable();
            $table->smallInteger('indefinite')->default(0);
            $table->string('patch');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('annexes');
    }
};
