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
        //creating the amenities table
        Schema::create('amenities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->softDeletes();
            $table->timestamps();
        });

        // creating the apartment amenities table
        Schema::create('apartment_amenities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('apartment_id')->constrained()->cascadeOnDelete();
            $table->foreignId('amenities_id')->constrained()->cascadeOnDelete();
            $table->softDeletes();
            $table->timestamps();
        });

        // payments issued
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tenant_id')->constrained()->cascadeOnDelete();
            $table->decimal('amount',10,2);
            $table->date('payment_date');
            $table->enum('payment_method',['card','online','cheque','cash','mobile money']);
            $table->softDeletes();
            $table->timestamps();
        });

        // maintenance requests
        Schema::create('maintenance_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tenant_id')->constrained()->cascadeOnDelete();
            $table->string('description');
            $table->enum('status',['pending','in progress','completed']);
            $table->softDeletes();
            $table->timestamps();
        });

      


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('amenities');
        Schema::dropIfExists('apartment_amenities');
        Schema::dropIfExists('payments');
        Schema::dropIfExists('maintenance_requests');
    }
};
