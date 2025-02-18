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
        Schema::create('log_transaksis', function (Blueprint $table) {
            $table->id();
            $table->string('transaksi_id');
            $table->string('paket');
            $table->foreignId('customer_id')->constrained('log_customers')->cascadeOnDelete();
            $table->string('loc_catering');
            $table->string('note');
            $table->integer('price');
            $table->enum('payment_status',['pending','success','cancel'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('log_transaksis');
    }
};
