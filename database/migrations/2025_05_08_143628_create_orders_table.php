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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('customer_id');
            $table->string('receiver_name');
            $table->string('receiver_mobile');
            $table->string('receiver_email');
            $table->string('receiver_add1');
            $table->string('receiver_city');
            $table->string('subtotal');
            $table->string('Total');
            $table->string('Pay_Method');
            $table->string('Pay_Status')->default('pending');
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
