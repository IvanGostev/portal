<?php

use App\Models\Subcategory;
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
        Schema::create('shipments', function (Blueprint $table) {
            $table->id();
            $table->string('number');
            $table->longText('description')->nullable();
            $table->foreignIdFor(User::class)->constrained();
            $table->foreignIdFor(Subcategory::class)->constrained();
            $table->string('contract_number');
            $table->string('order_number');
            $table->string('spp_element');
            $table->string('code_num');
            $table->string('title_num');
            $table->bigInteger('count');
            $table->string('unit');
            $table->string('address');
            $table->date('delivery_date');
            $table->date('new_delivery_date')->nullable();

            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipments');
    }
};
